<html>
<head>
<title>Change Ticket Type</title>
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

  //Type
  if(empty($_POST['Type']))
  {
  	$data_missing[] = 'Type';
  }
  else
  {
  	$Type = trim($_POST['Type']);
  }

  //Current Seat
  if(empty($_POST['Seat']))
  {
  	$data_missing[] = 'Seat';
  }
  else
  {
  	$Seat = trim($_POST['Seat']);
  }

  if(empty($data_missing))
  {
    $res = mysqli_query($conn, "SELECT Seat FROM Tickets WHERE Train_ID='$Train_ID' AND Type='$Type' AND Status='Available' ");
    $newSeat = mysqli_fetch_array($res);

    $sql = "UPDATE Tickets SET SSN='NULL', Status='Available' WHERE Train_ID='$Train_ID' AND Seat='$Seat' ";
    $conn->query($sql);

    $sql = "UPDATE Tickets SET SSN='$SSN', Status='Booked' WHERE Train_ID='$Train_ID' AND Seat='$newSeat[Seat]' ";
    $conn->query($sql);
    if($newSeat['Seat'] > 4)
    {
      $sql = "UPDATE Purchase SET price = '8' , Seat='$newSeat[Seat]' WHERE Train_ID='$Train_ID' AND SSN='$SSN' ";
      $conn->query($sql);
    }
    else
    {
      $sql = "UPDATE Purchase SET price = '14' , Seat='$newSeat[Seat]' WHERE Train_ID='$Train_ID' AND SSN='$SSN' ";
      $conn->query($sql);
    }
    echo "Swap Completed!";
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
