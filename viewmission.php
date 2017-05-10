
<!DOCTYPE html>
<html>
<head>
    <h1>View Mission</h1>
<title>View Mission</title>
    <?php include 'includes/header.php'; ?> 
</head>

<body>
<?php

require_once 'includes/login.php';
include 'includes/sanitize.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

if (isset($_GET['Mission_id'])) {
	$id = sanitizeMySQL($conn, $_GET['Mission_id']);
	$query = "SELECT * FROM `game_missions` Natural Join game_locations WHERE Mission_id=".$id;
    

	$result = $conn->query($query);
	if (!$result) die ("Invalid Request.");
	$rows = $result->num_rows;
	if ($rows == 0) {
		echo "No Results <br>";
	} else 
        echo '<h1>Missions </h1>';
     echo "<table><tr><th>Title</th><th>Mission Description</th><th>Game Locations</th></tr>";
    {
		while ($row = $result->fetch_assoc()) {
			
			echo "<td>".$row["Mission_Title"]."</td><td>".$row["Mission_Description"]."</td><td>"."<a href=\"viewloc.php?locations_id=".$row["locations_id"]."\">".$row["location_name"]."</td>";
            echo "<img src=\"".$row["mphoto_url"]."\" width=\"200\" height=\"200\">";
        
	echo '</tr>';			
		}
     			
 $query2 = "Select * From `game_character`"; 
        
        $result = $conn->query($query2);
	if (!$result) die ("Invalid Request.");
	$rows = $result->num_rows;
	if ($rows == 0) {
		echo "No Results <br>";
	} else 
     echo "<table><tr><th>Characters</th></tr>";
    {
		while ($row = $result->fetch_assoc()) {
			
			echo "<td><a href=\"Images/viewch.php?CID=".$row["CID"]."\">".$row["CName"]."</td>";
        
	echo '</tr>';			
        }} }}

include 'includes/footer.php';
    ?>
</body>
</html>
