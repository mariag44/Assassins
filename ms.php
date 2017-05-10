<!DOCTYPE html>
<html>
<head>
<title>Missions</title>
</head>
<body>
<html> 
  <head> 
    <title>Search Missions</title> 
      <?php
      include 'header.php';
      ?>
     <h3>Search  Missions</h3> 
    <p>Please Enter Something</p> 
	    <form  method="GET" action=""> 
	      <input  type="text" name="name"> 
	      <input  type="submit" name="submit" value="Search"> 
	    </form> 
  </head> 
 <body>
     
<?php 
require_once 'includes/login.php';
include 'includes/sanitize.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
if (isset($_GET["submit"])) {
	$id = sanitizeMySQL($conn, $_GET['name']);
	
    $query = "SELECT * FROM game_missions Natural Join game_locations Where mission_title like '%".$id."%' or Mission_Description like '%".$id."%' or locations_id like '%".$id."%'";
    
    $result = $conn->query($query);
	if (!$result) die ("Invalid Input.");
	$rows = $result->num_rows;
	if ($rows == 0) {
		echo "No Missions found<br>";
	} else 
    
    
     {
		while ($row = $result->fetch_assoc()) {
			echo "<table>";
        echo "<tr><th>Mission Name</th></tr>";
            echo "<br>";
            echo "<tr>";
			echo "<td>"."<a href=\Images/"viewmission.php?Mission_id= ".$row["Mission_id"]."\">".$row["Mission_Title"]."</td>";
            
            
            echo "</tr>";
            echo "</table>";
			 }}}

?>
    
 </body> 
    <footer> <?php
    include 'includes/footer.php';
    ?>
       </footer>
	</html> 