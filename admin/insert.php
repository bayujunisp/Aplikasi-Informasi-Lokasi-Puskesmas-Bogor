<?php
require_once "../koneksi.php";


	$x = addslashes($_POST['x']);
	$y = addslashes($_POST['y']);
	$keterangan = addslashes($_POST['keterangan']);
	$kecamatan = addslashes($_POST['kecamatan']);
	$alamat = addslashes($_POST['alamat']);
	$images = 'images';

$nama_folder = "../assets/images/";
	$foto = basename($_FILES['foto']['name']);
	$photo = $nama_folder . basename($_FILES['foto']['name']);

$sql = "SELECT id as maxid FROM puskesmas order by id desc";
$hasil = mysqli_query($koneksi, $sql);
$data  = mysqli_fetch_array($hasil);
$id = $data['maxid'];
$maxid = (int) $id;
$maxid++;
 
	if (move_uploaded_file($_FILES['foto']['tmp_name'], $photo)) {

	$query = "insert into puskesmas  (id, x, y, object, keterangan, foto, alamat, kecamatan) values ('$maxid','$x','$y','Puskesmas','$keterangan','$images/$foto','$alamat','$kecamatan')";
	$insert = mysqli_query($koneksi, $query);

echo "<script>alert('data berhasil disimpan');
document.location.href='tambah.php'; </script>";
	}else{
		echo "<script>alert('data gagal disimpan');
document.location.href='tambah.php'; </script>";
	}


?>
