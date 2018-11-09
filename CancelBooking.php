<html>
<head>
<title>Delete Reservation</title>
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

  //SSN
  if(empty($_POST['SSN']))
  {
  	$data_missing[] = 'SSN';
  }
  else
  {
  	$SSN = trim($_POST['SSN']);
  }

  //Train_ID
  if(empty($_POST['Train_ID']))
  {
  	$data_missing[] = 'Train_ID';
  }
  else
  {
  	$Train_ID = trim($_POST['Train_ID']);
  }

  //Seat
  if(empty($_POST['Seat']))
  {
  	$data_missing[] = 'Seat';
  }
  else
  {
  	$Seat = trim($_POST['Seat']);
  }

  //Destination
  if(empty($_POST['Destination']))
  {
  	$data_missing[] = 'Destination';
  }
  else
  {
  	$Dest= trim($_POST['Destination']);
  }

  if(empty($data_missing))
  {
    $sql = "UPDATE Tickets SET SSN='NULL', Status='Available' WHERE Train_ID='$Train_ID' AND Seat='$Seat' ";
    $conn->query($sql);

    $sql = "UPDATE Trips SET Space_Left=Space_Left + 1 WHERE Train_ID='$Train_ID' AND Space_Left < 10 ";
    $conn->query($sql);

    $sql = "DELETE FROM Purchase WHERE SSN='$SSN' AND Train_ID='$Train_ID' AND Seat='$Seat' ";
    $conn->query($sql);

    $sql = "DELETE FROM Passenger_Phone WHERE SSN='$SSN' ";
    $conn->query($sql);

    $sql = "DELETE FROM Passenger WHERE SSN='$SSN' ";
    $conn->query($sql);

    echo "Booking Deleted!";
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

<form action="http://localhost/TrainHome.php" method="post">

<P>
  <input type="submit" name="submit" value="Home" />
</P>

</form>
</body>	
</html>