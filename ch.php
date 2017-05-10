<!DOCTYPE html>
<html>
<head>
<title>Characters</title>
</head>
<body>
<html> 
  <head> 
    <title>Search Charachters</title> 
      <?php
      include 'includes/header.php';
      ?>
     <h3>Search  Characters</h3> 
    <p>Please Search by using the first name</p> 
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
	
    $query = "SELECT * FROM game_character Where CNAME like '%".$id."%' or CDes like '%".$id."%' ";
    
    $result = $conn->query($query);
	if (!$result) die ("Invalid Input.");
	$rows = $result->num_rows;
	if ($rows == 0) {
		echo "No Characters found<br>";
	} else 
    
    
     {
		while ($row = $result->fetch_assoc()) {
			echo "<table>";
        echo "<tr><th>Name</th></tr>";
            echo "<br>";
            echo "<tr>";
			echo "<td>"."<a href=\"viewch.php?CID=".$row["CID"]."\">".$row["CName"]."</td>";
            echo "</tr>";
            echo "</table>";
			 }}}
    
   



?>
    
    
 </body> 
    <footer> <?php include 'includes/footer.php'; ?></footer>
	</html> 