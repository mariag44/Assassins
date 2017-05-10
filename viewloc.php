<!DOCTYPE html>
<html>
<head>
<title>Locations</title>
    <?php
    include 'header.php';
    ?>
</head>

<body>
<?php

require_once 'includes/login.php';
include 'includes/Sanitize.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_GET['locations_id'])) {
	$id = sanitizeMySQL($conn, $_GET['locations_id']);
	
    $query = "SELECT * FROM game_locations WHERE locations_id= $id";
    
    #print $query;
	$result = $conn->query($query);
	if (!$result) die ("Invalid Character.");
	$rows = $result->num_rows;
	if ($rows == 0) {
		echo "No Locations Found <br>";
	} else {
		while ($row = $result->fetch_assoc()) {
			echo '<h1>Location Info</h1>';
            echo "<table>";
        echo "<tr><th>Location Name</th><th>Description</th></tr>";
			echo "<td>".$row["location_name"]."<td>".$row["location_description"]."</td>";
        echo "<img src=\Images/".$row["lphoto_url"]."\" width=\"500\" height=\"300\">";
	echo '</tr>';			
		}
    }}
	
?>
</body>
 <footer> <?php
    include 'includes/footer.php';
    ?>
       </footer>
</html>