<html>
<head>
<title>View Employee/Trip Information</title>
</head>

<body>
	
<?php
$servername = "localhost";
$username = "root";
$password = NULL;
$dbname = "FinalProject";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn -> connect_error)
{
  die("Connection failed: " . $conn -> connect_error);
}

if(isset($_POST['Code']))
{
  if($_POST['Code'] == 112233445)
  {
    $sql = "SELECT Destination, Departure_Time, Arrival_Time, Status, Space_Left, Train_ID FROM trips ";
    $result = $conn->query($sql);
    
    echo "CURRENT SCHEDULED TRIPS";
    echo '<br>';
    if($result->num_rows > 0)
    {
      echo '<table align="left" cellspacing = "5" cellpadding ="8">
      <td align="left"><b>Destination</b></td>
      <td align="left"><b>Departure Time</b></td>
      <td align="left"><b>Arrival Time</b></td>
      <td align="left"><b>Status</b></td>
      <td align="left"><b>Space Left</b></td>
      <td align="left"><b>Train ID</b></td></tr>';
  
      while($row = $result->fetch_assoc())
      {
        echo '<tr><td align=left">' .
        $row['Destination'] . '</td><td align="left">' .
        $row['Departure_Time'] . '</td><td align="left">' .
        $row['Arrival_Time'] . '</td><td align="left">' .
        $row['Status'] . '</td><td align="left">' .
        $row['Space_Left'] . '</td><td align="left">' .
         $row['Train_ID'] . '</td><td align="left">';

        echo '</tr>';
      }
      echo '</table>';
    }
    else
    {
      echo "0 results"; 
    }

    echo '<br>'. '<br>'. '<br>'. '<br>'. '<br>'. '<br>'. '<br>'. '<br>'. '<br>'. '<br>';
  }
}
?>

<p> CHANGE TRIP STATUS </p>
<form action="http://localhost/ChangeStatus.php" method="post">

  <P>Destination
  <input type="text" name="Destination" size="30" value="" />
  </P>

  <P>Departure Time
  <input type="text" name="Departure_Time" size="30" value="" />
  </P>

  <P>New Status
  <input type="text" name="Status" size="30" value="" />
  </P>

  <P>
    <input type="submit" name="submit" value="Send" />
  </P>
</form>

<?php

if(isset($_POST['Code']))
{
  if($_POST['Code'] == 112233445)
  {
    $sql = "SELECT Worker.Fname, Worker.Minit, Worker.Lname, Worker.WID, Worker_Phone.PHONE FROM Worker, Worker_Phone WHERE Worker.WID = Worker_Phone.WID ";
    $result = $conn->query($sql);
    
    echo "LIST OF CURRENT EMPLOYEES";
    echo '<br>';
    if($result->num_rows > 0)
    {
      echo '<table align="left" cellspacing = "5" cellpadding ="8">
      <td align="left"><b>First Name</b></td>
      <td align="left"><b>Middle Initial</b></td>
      <td align="left"><b>Last Name</b></td>
      <td align="left"><b>Worker ID</b></td>
      <td align="left"><b>Worker Phone</b></td></tr>';
  
      while($row = $result->fetch_assoc())
      {
        echo '<tr><td align=left">' .
        $row['Fname'] . '</td><td align="left">' .
        $row['Minit'] . '</td><td align="left">' .
        $row['Lname'] . '</td><td align="left">' .
        $row['WID'] . '</td><td align="left">' .
        $row['PHONE'] . '</td><td align="left">';

        echo '</tr>';
      }
      echo '</table>';

    }
    else
    {
      echo "0 results"; 
    }
    echo "<br>". "<br>". "<br>". "<br>". "<br>". "<br>". "<br>". "<br>"."<br>". "<br>". "<br>". "<br>". "<br>". "<br>". "<br>". "<br>". "<br>"."<br>". "<br>". "<br>". "<br>". "<br>";

    $sql = "SELECT WID, Rank FROM Conductor ";
    $result = $conn->query($sql);
    
    echo "LIST OF CURRENT CONDUCTORS";
    echo '<br>';
    if($result->num_rows > 0)
    {
      echo '<table align="left" cellspacing = "5" cellpadding ="8">
      <td align="left"><b>Worker ID</b></td>
      <td align="left"><b>Rank</b></td></tr>';
  
      while($row = $result->fetch_assoc())
      {
        echo '<tr><td align=left">' .
        $row['WID'] . '</td><td align="left">' .
        $row['Rank'] . '</td><td align="left">';

        echo '</tr>';
      }
      echo '</table>';
    }
    else
    {
      echo "0 results"; 
    }

    $sql = "SELECT WID, Signature_Dish FROM Cook ";
    $result = $conn->query($sql);


    
    echo "LIST OF CURRENT COOKS";
    echo '<br>';
    if($result->num_rows > 0)
    {
      echo '<table align="left" cellspacing = "5" cellpadding ="8">
      <td align="left"><b>Worker ID</b></td>
      <td align="left"><b>Signature Dish</b></td></tr>';
  
      while($row = $result->fetch_assoc())
      {
        echo '<tr><td align=left">' .
        $row['WID'] . '</td><td align="left">' .
        $row['Signature_Dish'] . '</td><td align="left">';

        echo '</tr>';
      }
      echo '</table>';
    }
    else
    {
      echo "0 results"; 
    }

    $sql = "SELECT WID, Type FROM Maintenance ";
    $result = $conn->query($sql);
    
    echo "LIST OF CURRENT MAINTENANCE WORKERS";
    echo '<br>';
    if($result->num_rows > 0)
    {
      echo '<table align="left" cellspacing = "5" cellpadding ="8">
      <td align="left"><b>Worker ID</b></td>
      <td align="left"><b>Type</b></td></tr>';
  
      while($row = $result->fetch_assoc())
      {
        echo '<tr><td align=left">' .
        $row['WID'] . '</td><td align="left">' .
        $row['Type'] . '</td><td align="left">';

        echo '</tr>';
      }
      echo '</table>';
    }
    else
    {
      echo "0 results"; 
    }
  
  echo "<br>". "<br>". "<br>". "<br>". "<br>". "<br>". "<br>". "<br>". "<br>". "<br>". "<br>";
  
  echo "TOTAL SALES";
  $tot_Sales = mysqli_query($conn,"SELECT SUM(Price) AS value_sum FROM Purchase");
  $row = mysqli_fetch_array($tot_Sales);
  echo "<br>";
  echo $row['value_sum'];
  }
  else
  {
    echo "Sorry, that isn't the right access code";
  }

}

$conn -> close();
echo '<br>';
?>

<br>
<form action="http://localhost/TrainHome.php" method="post">

<P>
  <input type="submit" name="submit" value="Home" />
</P>

</form>

</body>
</html>
