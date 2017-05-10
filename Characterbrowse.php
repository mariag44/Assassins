<!DOCTYPE html>
<html>
<head>
    <h1>Browse Characters </h1>
<title>Characters</title>
    <?php include 'header.php'; ?> 
</head>
<body>

<?php

#Login
require_once 'login.php';


$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM game_character";

$result = $conn->query($query);
if (!$result) die ("Database access failed:" . $conn->error);
$rows = $result->num_rows;

#print_r ($result);

echo "<table><tr><th>Character Names</th></tr>";
while ($row = $result->fetch_assoc()) {
	echo '<tr>';
	echo "<td>"."<a href=\Images/"viewch.php?CID=".$row["CID"]."\">".$row["CName"]."</td>";		
	echo '</tr>';
	}
echo "</table>";
?>


</body>
    <footer>
        <?php
    include 'footer.php';
    ?>
        </footer>
</html>