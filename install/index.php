<html>
<meta http-equiv="refresh" content="1; URL='user_profile.php'" />
</html>
<?php
include '../db.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
//DB Connection deits
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, '3306');

    
    $res = mysqli_query($conn,"CREATE TABLE `members` (
  `id` char(23) NOT NULL,
  `username` varchar(65) NOT NULL DEFAULT '',
  `password` varchar(65) NOT NULL DEFAULT '',
  `email` varchar(65) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `mod_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8") or die(mysqli_error($conn));
    
    
    $res2 = mysqli_query($conn,"INSERT INTO `members` (`id`, `username`, `password`, `email`, `verified`, `mod_timestamp`) VALUES
('21214350605cc74e4e9e089', 'admin', '$2y$10$Y69MnNEGw0UhQxBg2Q6edOft3EzItmctqIu/2g8Yj0KpsAMyVxkfi', 'admin@admin.com', 1, '2019-05-03 22:38:52');") or die(mysqli_error($conn));

$res3 = mysqli_query($conn,"CREATE TABLE `loginAttempts` (
  `IP` varchar(20) NOT NULL,
  `Attempts` int(11) NOT NULL,
  `LastLogin` datetime NOT NULL,
  `Username` varchar(65) DEFAULT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8") or die(mysqli_error($conn));
    
$res4 = mysqli_query($conn,"INSERT INTO `loginAttempts` (`IP`, `Attempts`, `LastLogin`, `Username`, `ID`) VALUES
('192.168.0.2', 2, '2019-05-03 22:12:53', 'admin', 4)") or die(mysqli_error($conn));
    

header("Location: user_profile.php");
?>