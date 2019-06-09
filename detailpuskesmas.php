<html lang ="en">
<div class="col-sm-10">
<div class="panel panel-primary">
	<div class="panel-heading">
		<strong>Info Detail</strong>
		<a href="detailpuskesmas.php?back=back" class="close">&times;</a>
		
	</div>
	<div class="panel-body">

<div class="row">
<div class="col-xs-1"><!-- banner --></div>
<div class="col-xs-10">
<?php

include 'koneksi.php';
$id = $_GET['id'];

$query ="SELECT * FROM puskesmas WHERE id ='$id'";
$run = mysqli_query($koneksi,$query);
while($data = mysqli_fetch_array($run))
{			
?>
<h1><?php echo $data['keterangan']; ?></h1>
<img src="assets/<?php echo $data['foto']; ?>" class="img-thumbnail" width="300px">
<h3>Alamat : <?php echo $data['alamat']; ?></h3>
<?php
}
?>
</div>
<div class="col-xs-1"><!-- banner --></div>
</div>

	</div>
	<div class="panel-footer">
	<form action="detailpuskesmas.php" method="get">
	<button name="back" class="btn btn-success">Back</button>
	</form>
<?php
if(isset($_GET['back'])){
header("location: index.php#map");
}
?>

	</div>
	</div>
</div>
</html>

