<html>
<head>
<title>Add Reservation</title>
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
  $Dest = $_POST['Dest'];
  $data_missing = array();

  //Fname
  if(empty($_POST['Fname']))
  {
  	$data_missing[] = 'Fname';
  }
  else
  {
  	$Fname = trim($_POST['Fname']);
  }

  //Minit
  if(empty($_POST['Minit']))
  {
  	$data_missing[] = 'Minit';
  }
  else
  {
  	$Minit = trim($_POST['Minit']);
  }

  //Lname
  if(empty($_POST['Lname']))
  {
  	$data_missing[] = 'Lname';
  }
  else
  {
  	$Lname = trim($_POST['Lname']);
  }

  //SSN
  if(empty($_POST['SSN']))
  {
  	$data_missing[] = 'SSN';
  }
  else
  {
  	$SSN = trim($_POST['SSN']);
  }

  //Address
  if(empty($_POST['Address']))
  {
  	$data_missing[] = 'Address';
  }
  else
  {
  	$Address = trim($_POST['Address']);
  }

  //Age
  if(empty($_POST['Age']))
  {
  	$data_missing[] = 'Age';
  }
  else
  {
  	$Age = trim($_POST['Age']);
  }

  //DOB
  if(empty($_POST['DOB']))
  {
  	$data_missing[] = 'DOB';
  }
  else
  {
  	$DOB = trim($_POST['DOB']);
  }

  //Phone Number
  if(empty($_POST['Phone']))
  {
  	$data_missing[] = 'Phone';
  }
  else
  {
  	$Phone = trim($_POST['Phone']);
  }

  //Ticket
  if(empty($_POST['Type']))
  {
  	$data_missing[] = 'Type';
  }
  else
  {
  	$Type = trim($_POST['Type']);
  }

  if(empty($data_missing))
  {
    //echo $Dest;
    $res = mysqli_query($conn, "SELECT Train_ID FROM trips WHERE Destination = '$Dest' ");
    $result = mysqli_fetch_array($res);
    //echo $result['Train_ID'];

    $res1 = mysqli_query($conn, "SELECT Seat FROM Tickets WHERE Train_ID = '$result[Train_ID]' AND Type = '$Type' AND Status = 'Available' ");
    $seat = mysqli_fetch_array($res1);
    //echo $seat['Seat'];



    $sql6 = "INSERT INTO Passenger_Phone (SSN, Phone) VALUES ('$SSN', '$Phone')";

    $sql4 = "INSERT INTO Purchase (Train_ID, Seat, SSN) VALUES ('$result[Train_ID]', '$seat[Seat]', '$SSN')";
    $sql5 = "UPDATE Purchase SET price = '14' WHERE Train_ID='$result[Train_ID]' AND Seat='$seat[Seat]' AND SSN='$SSN' ";
    $sql7 = "UPDATE Purchase SET price = '8' WHERE Train_ID='$result[Train_ID]' AND Seat='$seat[Seat]' AND SSN='$SSN' ";

    $sql3 = "UPDATE Trips SET Space_Left = Space_Left - 1 WHERE Train_ID='$result[Train_ID]' AND Destination='$Dest' AND Space_Left > 0"; 

    $sql2 = "UPDATE Tickets SET SSN='$SSN', Status='Booked' WHERE Train_ID='$result[Train_ID]' AND Seat='$seat[Seat]' ";

    $sql = "INSERT INTO Passenger (SSN, Fname, Lname, Minit, Address, Age, DOB) VALUES('$SSN', '$Fname', '$Lname', '$Minit', '$Address', '$Age', '$DOB')";

    if($conn->query($sql) === TRUE)
    {
      if($conn->query($sql3) === TRUE)
      {
        $conn->query($sql6);
        $conn->query($sql2);
        $conn->query($sql4);
        if($seat['Seat'] > 4)
        {
          $conn->query($sql5);
        }
        else
        {
          $conn->query($sql7);
        }
        echo "Tripe Booked!";
      }
      else 
      {
      	echo "Error: " . $sql3 . "<br>" . $conn->error;
      }
    }
    else
    {
      echo "Error: " . $sql . "<br>" . $conn->error;
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

<form action="http://localhost/TrainHome.php" method="post">

<P>
  <input type="submit" name="submit" value="Home" />
</P>

</form>

</body>
</html>
