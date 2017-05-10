<!DOCTYPE html>
<html>
<head>
<title>Collectibles</title>
</head>
<body>
<html> 
  <head> 
    <title>Search Downloadable Content</title> 
      <?php
      include 'includes/header.php';
      ?>
     <h3>Search  Downloadable Content</h3> 
    <p>Please Enter Keyword</p> 
	    <form  method="GET" action=""> 
	      <input  type="text" name="keyword"> 
	      <input  type="submit" name="submit" value="Search"> 
	    </form> 
  </head> 
 <body>

<?php 
require_once 'includes/login.php';
include 'includes/sanitize.php';
     $errors = array();
     
if (isset($_GET['submit'])) {
    $keyword = isset ($_GET['name']) ? $_GET['name']: null;
    if (strlen(trim($keyword)) === 0) { $errors[] = "You Must Enter a Keyword!";
    if (empty($errors)) {
      if (!empty($errors)) {
          echo '<h3>You Must Enter a Keyord! </h3>';
          foreach ($errors as $errormessage) {
              echo $errormessage .'<br>';
          }
      }  
    }      }
}     
     
$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
if (isset($_GET["submit"])) {
	$id = sanitizeMySQL($conn, $_GET['keyword']);
	
    $query = "SELECT * FROM game_dlc Where dlc_title like '%".$id."%' or dlc_description like '%".$id."%'";
    
    $result = $conn->query($query);
	if (!$result) die ("Invalid Input.");
	$rows = $result->num_rows;
	if ($rows == 0) {
		echo "No Collectibles found<br>";
	} else 
    
    
     {
		while ($row = $result->fetch_assoc()) {
			echo "<table>";
        echo "<tr><th>Downloadable Content</th></tr>";
            echo "<br>";
            echo "<tr>";
			echo "<td>"."<a href=\Images/"viewdlc.php?dlc_id=".$row["dlc_id"]."\">".$row["dlc_title"]."</td>";
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