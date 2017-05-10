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

require_once 'login.php';
include 'sanitize.php';
    

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_GET['CID'])) {
	$id = sanitizeMySQL($conn, $_GET['CID']);
	$query = "SELECT * FROM game_character WHERE CID= $id";
    
    #print $query;
	$result = $conn->query($query);
	if (!$result) die ("Invalid Character.");
	$rows = $result->num_rows;
	if ($rows == 0) {
		echo "No Character found <br>";
	} else {
		while ($row = $result->fetch_assoc()) {
			echo '<h1>Character Bio</h1>';
            echo "<table>";
        echo "<tr><th>Name</th><th>Description</th></tr>";
			echo "<td>".$row["CName"]."</td><td>".$row["CDes"]."</td>";
        echo "<img src=\Images/".$row["photo_url"]."\" width=\"200\" height=\"450\">";
	echo '</tr>';			
		}
    }}
	
?>

    </body>

<footer> <?php include "footer.php"; ?> </footer>
</html>


