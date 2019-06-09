<?php
include('../koneksi.php');

session_start();


$username=$_POST['username'];
$password=$_POST['password'];


$username=mysqli_real_escape_string($koneksi,$username);
$password=mysqli_real_escape_string($koneksi,$password);


if (empty($username) && empty($password)){
	
	header('location:index.php?error=1');
	break;
}else if (empty($username)){
	
	header('location:index.php?error=2');
	break;
}else if (empty($password)){
	
	header('location:index.php?error=3');
	break;
}

$q= mysqli_query($koneksi,"SELECT * FROM admin WHERE username='$username' AND password='$password'");

if(mysqli_num_rows($q) == 1){
	
	$_SESSION['username'] = $username;
	

		
	header('location:home.php');
} else {
	
	header('location:index.php?error=4');
	
}
?>