<html>
<head>
<title>Trip Details</title>
</head> 

<body>

<form action="http://localhost/TrainHome.php" method="post">

<P>
  <input type="submit" name="submit" value="Home" />
</P>

</form>

	
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

if(isset($_POST['SSN']))
{
  $SSN = $_POST['SSN'];
  
  $sql = "SELECT SSN, Fname, Lname, Minit, Address, Age, DOB FROM Passenger WHERE SSN = '$SSN' ";

  $result = $conn->query($sql);
  
  echo 'PASSENGER INFO'. "<br>";
  if($result->num_rows > 0)
  {
    echo '<table align="left" cellspacing = "5" cellpadding ="8">
    <td align="left"><b>SSN</b></td>
    <td align="left"><b>Fname</b></td>
    <td align="left"><b>Lname</b></td>
    <td align="left"><b>Minit</b></td>
    <td align="left"><b>Address</b></td>
    <td align="left"><b>Age</b></td>
    <td align="left"><b>DOB</b></td></tr>';
  
    while($row = $result->fetch_assoc())
    {
      echo '<tr><td align=left">' .
      $row['SSN'] . '</td><td align="left">' .
      $row['Fname'] . '</td><td align="left">' .
      $row['Lname'] . '</td><td align="left">' .
      $row['Minit'] . '</td><td align="left">' .
      $row['Address'] . '</td><td align="left">' .
      $row['Age'] . '</td><td align="left">' .
      $row['DOB'] . '</td><td align="left">';

      echo '</tr>';
    }
    echo '</table>';
    echo "<br>". "<br>". "<br>". "<br>". "<br>";

    $sql = "SELECT Tickets.Train_ID, Tickets.Seat, Tickets.Type, Purchase.price FROM Tickets, Purchase WHERE Tickets.SSN= Purchase.SSN AND Tickets.SSN='$SSN' ";

    $result = $conn->query($sql);

    echo "<p align=left>TICKET INFO </p> "; 
    echo '<table align="left" cellspacing = "5" cellpadding ="8">
    <td align="left"><b>Train_ID</b></td>
    <td align="left"><b>Seat</b></td>
    <td align="left"><b>Type</b></td>
    <td align="left"><b>Price</b></td></tr>';
  
    while($row = $result->fetch_assoc())
    {
      
      if($row['Seat'] > 4)
      {
        $price = 8;
      }
      else
      {
        $price = 14;
      }


      echo '<tr><td align=left">' .
      $row['Train_ID'] . '</td><td align="left">' .
      $row['Seat'] . '</td><td align="left">' .
      $row['Type'] . '</td><td align="left">' .
      $price . '</td><td align="left">';

      echo '</tr>';
    }
    echo '</table>';
    echo "<br>". "<br>". "<br>". "<br>". "<br>";

    $sql = "SELECT Trips.Destination, Trips.Departure_Time, Trips.Arrival_Time, Trips.Status FROM Trips, Tickets WHERE Tickets.SSN='$SSN' AND Trips.Train_ID = Tickets.Train_ID ";
    $result = $conn->query($sql);

    echo "<p align=left>TRIP(S) INFO </p> "; 
    echo '<table align="left" cellspacing = "5" cellpadding ="8">
    <td align="left"><b>Destination</b></td>
    <td align="left"><b>Departure Time</b></td>
    <td align="left"><b>Arrival Time</b></td>
    <td align="left"><b>Status</b></td></tr>';
  
    while($row = $result->fetch_assoc())
    {
      echo '<tr><td align=left">' .
      $row['Destination'] . '</td><td align="left">' .
      $row['Departure_Time'] . '</td><td align="left">' .
      $row['Arrival_Time'] . '</td><td align="left">' .
      $row['Status'] . '</td><td align="left">' ;

      echo '</tr>';
    }
    echo '</table>';

  }  
  else
  {
    echo "0 results; Please go back and make sure you typed in a registered SSN"; 
  }
}

echo "<br>". "<br>". "<br>". "<br>". "<br>". "<br>". "<br>". "<br>";
$conn -> close();
?>
<p> CHANGE TICKET TYPE </p>
<form action="http://localhost/ChangeType.php" method="post">

  <P>SSN
  <input type="text" name="SSN" size="30" value="" />
  </P>

  <P>Train ID#
  <input type="text" name="Train_ID" size="30" value="" />
  </P>

  <P>Type Wanted
  <input type="text" name="Type" size="30" value="" />
  </P>

  <P>Current Seat #
  <input type="text" name="Seat" size="30" value="" />
  </P>

  <P>
    <input type="submit" name="submit" value="Send" />
  </P>
</form>

<p>DELETE BOOKING</p>
<form action="http://localhost/CancelBooking.php" method="post">
  
  <P>SSN
  <input type="text" name="SSN" size="30" value="" />
  </P>

  <P>Train ID#
  <input type="text" name="Train_ID" size="30" value="" />
  </P>

  <P>Seat #
  <input type="text" name="Seat" size="30" value="" />
  </P>

  <P>Destination
  <input type="text" name="Destination" size="30" value="" />
  </P>
  
  <P>
    <input type="submit" name="submit" value="Delete Booking" />
  </P>

</form>

</body>
</html>
