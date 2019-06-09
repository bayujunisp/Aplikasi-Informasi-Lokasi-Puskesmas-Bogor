<html lang ="en">
<div class="col-sm-12">
<div class="panel panel-primary">
	<div class="panel-heading">
		<strong>Detail Gambar</strong>
		<a href="puskesmas.php" class="close">&times;</a>
	</div>
	<div class="panel-body">
<?php

include '../koneksi.php';
$id = $_GET['id'];

$query ="SELECT * FROM puskesmas WHERE id ='$id'";
$run = mysqli_query($koneksi,$query);
while($data = mysqli_fetch_array($run))
{			
?>
<img src="../assets/<?php echo $data['foto']; ?>" class="img-thumbnail" width="500px">
<?php
}
?>
	</div>
	<div class="panel-footer">
		<a href="puskesmas.php" class="btn btn-success">Back</a>
	</div>
	</div>
</div>
</html>
