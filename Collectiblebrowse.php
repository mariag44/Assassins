<!DOCTYPE html>
<html>
<head>
<title>Collectibles</title>
    <?php include 'header.php'; ?>
    <h1>Browse Collectibles</h1>
</head>
<body>



<?php

#Login
require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM game_collectibles";

$result = $conn->query($query);
if (!$result) die ("Database access failed:" . $conn->error);
$rows = $result->num_rows;

#print_r ($result);

echo "<table><tr><th>Name</th></tr>";
    
while ($row = $result->fetch_assoc()) {
	echo '<tr>';
	echo "<td>"."<a href=\Images/"viewcollectible.php?collectible_id=".$row["collectible_id"]."\">".$row["collectible_name"]."</td>";		
	echo '</tr>';
	}
echo "</table>";
?>


</body>
    <footer> <?php include "includes/footer.php"; ?> </footer>
</html>