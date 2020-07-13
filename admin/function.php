<?php include("../includes/db.php"); ?>
<?php

function confirm_query($sql){
  global $connection;
  if(!$sql){
    die("QUERY FAILED " . mysqli_error($connection));
  }
}

function escape($string){
    global $connection;
    return mysqli_real_escape_string($connection,$string);
}











//echo "<h1>FUNCTION.php</h1>";


 ?>
