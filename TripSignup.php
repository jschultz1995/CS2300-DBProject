<html>
<head>
<title>Signup for a Trip!</title>
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

if(isset($_POST['Destination']))
{
  $Dest = $_POST['Destination'];

  $sql = "SELECT Destination, Departure_Time, Arrival_Time, Status, Space_Left FROM trips WHERE Destination = '$Dest' ";
  $result = $conn->query($sql);

  if($result->num_rows > 0)
  {
    echo '<table align="left" cellspacing = "5" cellpadding ="8">
    <td align="left"><b>Destination</b></td>
    <td align="left"><b>Departure Time</b></td>
    <td align="left"><b>Arrival Time</b></td>
    <td align="left"><b>Status</b></td>
    <td align="left"><b>Space Left</b></td></tr>';
  
    while($row = $result->fetch_assoc())
    {
      echo '<tr><td align=left">' .
      $row['Destination'] . '</td><td align="left">' .
      $row['Departure_Time'] . '</td><td align="left">' .
      $row['Arrival_Time'] . '</td><td align="left">' .
      $row['Status'] . '</td><td align="left">' .
      $row['Space_Left'] . '</td><td align="left">';

      echo '</tr>';
    }
    echo '</table>';
  }
  else
  {
    echo "0 results; Please go back and make sure you typed in an available destination as it appears in the table"; 
  }
}
$conn -> close();
?>
</body>

<body>

<br>
<br>
<br>
<br>
<br>

<form action="http://localhost/ReservationAdded.php" method="post">
  <b>Fill in the Following Information:</b>

  <p>First Name:
  <input type="text" name="Fname" size="30" value="" />
  </p> 

  <p>Middle Initial:
  <input type="text" name="Minit" size="30" maxlength="1" value="" />
  </p> 

  <p>Last Name:
  <input type="text" name="Lname" size="30" value="" />
  </p> 

  <p>SSN:
  <input type="text" name="SSN" size="30" maxlength="9" value="" />
  </p> 

  <p>Address:
  <input type="text" name="Address" size="60" value="" />
  </p> 

  <p>Age:
  <input type="text" name="Age" size="30" value="" />
  </p> 

  <p>Date of Birth:
  <input type="text" name="DOB" size="30" value="" />
  </p>

  <p>Phone Number:
  <input type="text" name="Phone" size="30" value="" />
  </p>  

  <p>Desired Ticket(First Class, Business):
  <input type="text" name="Type" size="30" value="" />
  </p>  

  <input type="hidden" name="Dest" value="<?php echo $Dest;?>" />

  <P>
    <input type="submit" name="submit" value="Send" />
  </P>
</form>


</body>
</html>