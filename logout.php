<?php 
	include 'index.php';
	$username="";
	$password="";
	session_destroy();
	$_SESSION["session_username"]="";
	$url='index.php';
	header("Location: $url");

?>
