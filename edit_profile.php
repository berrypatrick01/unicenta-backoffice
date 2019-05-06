<?php
include 'db.php';
require "login/loginheader.php";
$newpw = password_hash($_POST['password'], PASSWORD_DEFAULT);
$username = $_SESSION['username'];
$email = $_POST['email'];

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ("could not connect to mysql");
$query = "UPDATE members SET password='$newpw', email='$email' WHERE username='$username'";
      $result = mysqli_query($conn, $query) or die('Query fail: ' . mysqli_error());

header('Location: index.php');

?>
