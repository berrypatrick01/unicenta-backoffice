<?php
include 'db.php';

//DATABASE CONNECTION VARIABLES
$host = $dbhost; // Host name
$username = $dbuser; // Mysql username
$password = $dbpass; // Mysql password
$db_name = $dbname; // Database name

//DO NOT CHANGE BELOW THIS LINE UNLESS YOU CHANGE THE NAMES OF THE MEMBERS AND LOGINATTEMPTS TABLES

$tbl_prefix = ""; //***PLANNED FEATURE, LEAVE VALUE BLANK FOR NOW*** Prefix for all database tables
$tbl_members = $tbl_prefix."members";
$tbl_attempts = $tbl_prefix."loginAttempts";
?>