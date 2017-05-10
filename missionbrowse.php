<!DOCTYPE html>
<html>
<head>
<?php
    include 'header.php';
    ?>
<title>Missions</title>
</head>
<body>

<h1>Browse Missions</h1>

<?php

#Login
require_once 'includes/login.php';
    

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM `game_missions`";

$result = $conn->query($query);
if (!$result) die ("Database access failed:" . $conn->error);
$rows = $result->num_rows;

#print_r ($result);

echo "<table><tr><th>Title</th><th>Description</th><th></tr>";

while ($row = $result->fetch_assoc()) {
	echo '<tr>';

	echo "<td>"."<a href=\Images/"viewmission.php?Mission_id=".$row["Mission_id"]."\">".$row["Mission_Title"]."</td>";	
    
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