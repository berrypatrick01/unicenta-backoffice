<?php
                
               
                
               include 'db.php';

$id = $_POST['id'];
$prod_name = $_POST['prod_name'];
$units = $_POST['units'];

            // Create Connection
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
            $query = "UPDATE stockcurrent SET units='{$units}' WHERE product='{$id}'";
      $result = mysqli_query($conn, $query) or die('Query fail: ' . mysqli_error());

header('Location: stock.php');