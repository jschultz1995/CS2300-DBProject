<!DOCTYPE html>
<html>
<head>
<style> 
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
    
input[type=text] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}
</style>
</head>
<body>


<p style="margin-bottom: 100px; width: 500px;">
Welcome to the Rolla Trainstation! Thank you for travelling with us!
</p>

<form action="http://localhost/TripDetails.php" method="post">
  <b>Enter your SSN to see your trip details(Use this only if you have already reserved a ticket!!)</b>
  
  <P>SSN:
  <input type="text" name="SSN" placeholder="Search.." size="30" maxlength="9" value="" />
  </P>

  <P>
    <input type="submit" name="submit" value="Send" />
  </P>
</form>


<form action="http://localhost/TripSignup.php" method="post">
  <b>Enter the Destination you would like to go to!(listed below)</b>

  <P>Destination:
  <input type="text" name="Destination" placeholder="Search.." size="30" value="" />
  </P>

  <P>
    <input type="submit" name="submit" value="Send" />
  </P>
</form>


<p style="margin-bottom: 30px; width: 300px;">
Below are some upcoming trips!</p>

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

$sql = "SELECT Destination, Departure_Time, Arrival_Time, Status, Space_Left FROM trips ";
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
  echo "0 results"; 
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
<form action="http://localhost/Admin.php" method="post">
  <b>If you're an administrator, please enter the special code to gain access to employee and trip information</b>

  <P>Access Code:
  <input type="text" name="Code" size="30" maxlength="9" value="" />
  </P>

  <P>
    <input type="submit" name="submit" value="Send" />
  </P>

</form>


</body>
</html>
