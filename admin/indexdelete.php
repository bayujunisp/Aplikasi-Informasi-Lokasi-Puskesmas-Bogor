<html lang ="en">
<body>
<div class="col-sm-12">
	<div class="panel panel-primary">
	<div class="panel-heading">
	<span class="glyphicon glyphicon-edit" width="50"></span> <strong>Delete puskesmas</strong>
<a href="puskesmas.php" class="close">&times;</a>
	</div>
	<div class="panel-body">
<table class="table table-hover table-bordered results">
  <thead>
    <tr>
      <th>No</th>
      <th>X</th>
<th>Y</th>
<th>Nama Puskesmas</th>
<th>Alamat</th>
<th>Kecamatan</th>
<th>Foto</th>
    </tr>
    <tr class="warning no-result">
      <td colspan="4"><i class="fa fa-warning"></i> No result</td>
    </tr>
  </thead>
  <tbody>
 <?php
include '../koneksi.php';
$id = $_GET['id'];
$sql = "select*from puskesmas where id = '$id'";
$run = mysqli_query($koneksi,$sql);

 $no = 1;
  while($data = mysqli_fetch_array($run)){
   ?>
 
    <tr>
      <th scope="row"><?php echo $no; ?></th>

<td><?php echo $data['x']; ?></td>
<td><?php echo $data['y']; ?></td>     
<td><?php echo $data['keterangan']; ?></td>
<td><?php echo $data['alamat']; ?></td>
<td><?php echo $data['kecamatan']; ?></td>
<td><img src="../assets/<?php echo $data['foto']; ?>" width="200px" height="200px;"></td>


    </tr>
<?php 
  $no++;


?>
</tbody>
</table>
<center>

	

	<h3>Yakin Ingin Menghapus Data Ini</h3>
<br>	
	<a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-success" title="Delete">Submit</a>
	<a href="puskesmas.php" class="btn btn-danger">Cancel</a>
<?php
}
?>
</div>
	
	</div>
</div>
</center>	
</body>
</html>