<?php
include '../koneksi.php';

$id =$_GET['id'];
$query="delete from puskesmas where id='$id'";

$run = mysqli_query($koneksi,$query);
if($run){
	header('location:puskesmas.php?message=suksesdelete');
}
else{
	header('location:puskesmas.php?message=gagaldelete');
}




?>