<!DOCTYPE html>
<html>
<head>
<title>Characters</title>
</head>
<body>
<html> 
  <head> 
    <title>Search Locations</title> 
      <?php
      include 'header.php';
      ?>
     <h3>Search  Locations</h3> 
    <p>Please Enter Keyword</p> 
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
	
    $query = "SELECT * FROM game_locations Where location_name like '%".$id."%' or location_description like '%".$id."%'";
    
    $result = $conn->query($query);
	if (!$result) die ("Invalid Input.");
	$rows = $result->num_rows;
	if ($rows == 0) {
		echo "No Locations found<br>";
	} else 
    
    
     {
		while ($row = $result->fetch_assoc()) {
			echo "<table>";
        echo "<tr><th>Location Name</th></tr>";
            echo "<br>";
            echo "<tr>";
			echo "<td>"."<a href=\Images/"viewloc.php?locations_id=".$row["locations_id"]."\">".$row["location_name"]."</td>";
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