<?php
	ob_start();
	session_start();
?>
<?php
	$server = "localhost";
	$user =  "root";
	$password = "";
	$dbname = "ceaser_frnd";
	$connection = mysqli_connect($server, $user, $password, $dbname) or die("sorry connection to server failed");
?>
