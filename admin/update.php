]<?php
include '../koneksi.php';
$id = $_POST['id'];
$x = $_POST['x'];
$y = $_POST['y'];
$keterangan = $_POST['keterangan'];
$images = 'images';
$alamat = $_POST['alamat'];
$kecamatan = $_POST['kecamatan'];

    $nama_folder = "../assets/images/";
	$foto = basename($_FILES['foto']['name']);
	$photo = $nama_folder . basename($_FILES['foto']['name']);

 
	if (move_uploaded_file($_FILES['foto']['tmp_name'], $photo)) {
		$query = mysqli_query($koneksi,"update puskesmas set x = '$x',y= '$y',keterangan = '$keterangan',
			foto ='$images/$foto',alamat = '$alamat',kecamatan='$kecamatan' where id = '$id'") or die(mysqli_error());
		

	header('location:puskesmas.php?message=suksesedit');
  }
	 else {
	 	$foto = $_POST['foto'];
$query = mysqli_query($koneksi,"update puskesmas set x = '$x',y= '$y',keterangan = '$keterangan',
			foto ='$foto',alamat = '$alamat',kecamatan='$kecamatan' where id = '$id'") or die(mysqli_error());

		echo "<script>alert('data Berhasil disimpan');
document.location.href='puskesmas.php'; </script>";
	}

?>