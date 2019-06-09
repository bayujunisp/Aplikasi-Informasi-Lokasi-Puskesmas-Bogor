<html lang ="en">
<div class="col-sm-12">
<div class="panel panel-primary">
<div class="panel-heading">
<span class="glyphicon glyphicon-edit" width="50"></span> <strong>Edit</strong>
<a href="puskesmas.php" class="close">&times;</a>
</div>
<div class="panel-body">
<?php
include '../koneksi.php';
$id = $_GET['id'];
$sql = "select*from puskesmas where id = '$id'";
$run = mysqli_query($koneksi,$sql);

 $no = 1;
  while($data = mysqli_fetch_array($run)){
   ?>
  
<br>
<form name="update" action="update.php" method="post" class="form-horizontal" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
<input type="hidden" name="foto" value="<?php echo $data['foto']; ?>" />
<div class="form-group">
<label class="control-label col-sm-2" for="user">x :</label>
<div class="col-sm-5">
<input type="text" name="x" placeholder="x" class="form-control" id="user" required="required" value="<?php echo $data['x']; ?>">
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2" for="pass">y :</label>
<div class="col-sm-5">
<input type="y" name="y" placeholder="y" class="form-control" id="pass" required="required" value="<?php echo $data['y']; ?>">
</div>
</div>

<br><div class="form-group">
<label class="control-label col-sm-2" for="nm">Nama Puskesmas :</label>
<div class="col-sm-5">
<input type="text" name="keterangan" placeholder="Nama" class="form-control" id="nm" required="required" value="<?php echo $data['keterangan']; ?>">
</div>
</div> 

<div class="form-group">
<label class="control-label col-sm-2" for="ft">Foto :</label>
<div class="col-sm-5">

<input type="file" name="foto" id="ft" value="<?php echo $data['foto']; ?>"><?php echo $data['foto']; ?></input>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2" for="almt">Alamat :</label>
<div class="col-sm-5">
<input type="text" name="alamat" placeholder="Alamat Puskesmas" class="form-control" id="almt" required="required" value="<?php echo $data['alamat']; ?>">
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2" for="kecamatan">kecamatan :</label>
<div class="col-sm-5">
<input type="text" name="kecamatan" placeholder="kecamatan Puskesmas" class="form-control" id="kecamatan" required="required" value="<?php echo $data['kecamatan'];?>">
</div>
</div>

<div class="form-group">
<div class="col-sm-offset-5 col-sm-5">
<br>
<br>
<button type="submit" class="btn btn-success" value="simpan">Submit</button> 
<a href="kelol.php" class="btn btn-danger">Cancel</a>
<br>
<br>
</div>
</div>
<?php
}
?>
</div>
</div>
</form>

</div>
</div>
</form>
</html>
