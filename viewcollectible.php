<!DOCTYPE html>
<html>
<head>
    <title>View Collectables</title> 
      <?php
      include 'header.php';
      ?>
    </head>
<body>
<?php

require_once 'login.php';
include 'sanitize.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_GET['collectible_id'])) {
	$id = sanitizeMySQL($conn, $_GET['collectible_id']);
	$query = "SELECT * FROM game_collectibles Natural Join collectibles_to_locations Natural Join game_locations WHERE collectible_id= $id";
    
    #print $query;
	$result = $conn->query($query);
	if (!$result) die ("Invalid Character.");
	$rows = $result->num_rows;
	if ($rows == 0) {
		echo "No Collectible Found <br>";
	} else {
		while ($row = $result->fetch_assoc()) {
			echo '<h1>Collectible Info</h1>';
            echo "<table>";
        echo "<tr><th>Collectible Name</th><th>Description</th><th>Location Names</th></tr>";
			echo "<td>".$row["collectible_name"]."<td>".$row["collectible_description"]."</td><td>"."<a href=\"viewloc.php?locations_id=".$row["locations_id"]."\">".$row["location_name"]."</td>";
            echo "<img src=\Images/".$row["cphoto_url"]."\" width=\"200\" height=\"200\">";
        
	echo '</tr>';			
		}
    }}
	
?>
    </body> 
    <footer> <?php include 'includes/footer.php'; ?></footer>
    </html>