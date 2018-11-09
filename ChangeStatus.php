<html>
<head>
<title>Change Trip Status</title>
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

if(isset($_POST['submit']))
{
  $data_missing = array();

  //Destination
  if(empty($_POST['Destination']))
  {
  	$data_missing[] = 'Destination';
  }
  else
  {
  	$Dest = trim($_POST['Destination']);
  }

  //Departure Time
  if(empty($_POST['Departure_Time']))
  {
  	$data_missing[] = 'Departure_Time';
  }
  else
  {
  	$Departure_Time = trim($_POST['Departure_Time']);
  }

  //Status
  if(empty($_POST['Status']))
  {
  	$data_missing[] = 'Status';
  }
  else
  {
  	$Status = trim($_POST['Status']);
  }

  if(empty($data_missing))
  {
    $sql = "UPDATE Trips SET Status='$Status' WHERE Departure_Time='$Departure_Time' AND Destination='$Dest' ";

    $conn->query($sql);

    $res = mysqli_query($conn, "SELECT Train_ID FROM trips WHERE Destination = '$Dest' AND Departure_Time='$Departure_Time' ");
    $result = mysqli_fetch_array($res);
    //echo $result['Train_ID'];

    $sql = "SELECT SSN FROM Tickets WHERE Train_ID='$result[Train_ID]' AND Status='Booked' ";
    $result2 = $conn->query($sql);

    if($result2->num_rows > 0)
    {
      echo '<table align="left" cellspacing = "5" cellpadding ="8">
      <td align="left"><b>Phone Number to Notify</b></td></tr>';

      while($row =  $result2->fetch_assoc())
      {
        $phone_query = mysqli_query($conn, "SELECT Phone FROM Passenger_Phone WHERE SSN='$row[SSN]' ");
        $phone = mysqli_fetch_array($phone_query);

        echo'<tr><td align=left">'.
        $phone['Phone']. '</td><td align="left">';

        echo '</tr>';

      }
      echo '</table>';
    }
    else
    {
      echo "No notifications need to be sent";
    }

  }
  else
  {
  	echo 'You need to enter the following data<br />';

  	foreach($data_missing as $missing)
  	{
  	  echo "$missing<br />";
  	}
  }

}
$conn -> close();
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<form action="http://localhost/TrainHome.php" method="post">

<P>
  <input type="submit" name="submit" value="Home" />
</P>

</form>

</body>
</html>
