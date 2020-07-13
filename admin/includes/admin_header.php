<?php session_start(); ?>
<?php ob_start(); ?>
<?php include('./function.php');  ?>
<?php include('../includes/db.php');  ?>


<?php
if (!isset($_SESSION['username'])) {

  header("Location: ../index.php");
}else{
  if ($_SESSION['user_role'] !== 'admin') {
    header("Location: ../index.php");
  }
}

 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <?php include('admin_nav.php');  ?>
