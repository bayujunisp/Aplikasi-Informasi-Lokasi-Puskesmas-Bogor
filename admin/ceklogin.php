<?php
session_start();

$username = $_SESSION ['username'];

if (!isset($username) || empty($username)) {
	
	header('location:login.php');
}

?>