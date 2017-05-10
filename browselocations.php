<!DOCTYPE html>
<html>
<head>
<h1> 
</h1>
    
<title>Locations</title>
</head>
<body>

<h1>Browse Locations</h1>

<?php

#Login
require_once 'login.php';
include 'header.php';
include 'sanitize.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM game_locations";

$result = $conn->query($query);
if (!$result) die ("Database access failed:" . $conn->error);
$rows = $result->num_rows;

#print_r ($result);

echo "<table><tr><th>Location</th>";
while ($row = $result->fetch_assoc()) {
	echo '<tr>';
	echo "<td>"."<a href=\Images"\"viewloc.php?locations_id=".$row["locations_id"]."\">".$row["location_name"]."</td>";		
	echo '</tr>';
	}
echo "</table>";
?>

    

</body>
</html>