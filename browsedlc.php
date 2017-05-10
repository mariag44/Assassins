<!DOCTYPE html>
<html>
<head>
    <?php
    include 'header.php';
    ?>
<title>Collectibles</title>
    <h1>Browse Downloadable Content</h1>
</head>
<body>

<?php

#Login
require_once 'includes/login.php';


$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM game_dlc Natural Join game_locations";

$result = $conn->query($query);
if (!$result) die ("Database access failed:" . $conn->error);
$rows = $result->num_rows;

#print_r ($result);

echo "<table><tr><th>Name</th></tr>";
    
while ($row = $result->fetch_assoc()) {
	echo '<tr>';
	echo "<td>"."<a href=\Images/"viewdlc.php?dlc_id=".$row["dlc_id"]."\">".$row["dlc_title"]."</td>";		
	echo '</tr>';
	}
echo "</table>";
?>


</body>
     <footer> <?php
    include 'includes/footer.php';
    ?>
       </footer>
</html>