<?php 
include 'ceklogin.php';
include '../koneksi.php';
 ?>
<!doctype>
<html lang='ind'>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   
<meta charset="utf-8">
   <script src="../assets/js/jquery-3.2.1.min.js"></script> <!-- memanggil jquery di folder js -->

<script src="../assets/js/bayuscript.js"></script>
<script src="../assets/js/bootstrap.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/click.js"></script>
<script src="../assets/js/search.js"></script>

<script src="../assets/js/jquery.dataTables.js"></script>
<script src="../assets/js/dataTables.bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/css/dataTables.bootstrap.css">

<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../assets/css/styles-menu-adminstyles-menu-admin.css">
<link rel="stylesheet" type="text/css" href="../assets/css/styles-menu-admin.css">
<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">

   <title>Administrator</title><link rel="icon" href="../assets/image/favicon.ico">
</head>
<body>
   <div class="col-md-2 colmenu" style="padding:0; height: 100%;">
   <br>
     
      
      <div class="col-md-12" style="padding:20px;padding-bottom:0px;color:#fff; font-size: 20px;"><center><b>PUSKESMAS</b></center></div>

       <div class="col-md-12" style=""><center><img src="../assets/image/logo.png" alt="" height="150px" width="150px"></center></div>

         <div id='cssmenu'>
<ul>
   <li><a href="home.php"><i class="fa fa-home fa-fw"></i>&nbsp; Home</a></li>

   <li class="active"><a href="puskesmas.php"><i class="fa fa-table fa-fw"></i>&nbsp; Puskesmas</a>
      
    <li><a href="tambah.php"><i class="fa fa-plus fa-fw"></i>&nbsp; Input Data</a></li>

   <li class='last'><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>&nbsp; Logout</a></li>
</ul>
</div>

   </div>
    <?php 
$nama = $_SESSION['username'];
$query = mysqli_query($koneksi,"select*from admin where username = '$nama'");
while ($data = mysqli_fetch_array($query)) 
 {
 ?>
     <div class="col-md-10" style="padding:0px">
      <ol class="breadcrumb" style="margin:0;border-radius:0;">
           <li><a href="home.php"><i class="fa fa-home fa-fw"></i>&nbsp;Home</a></li>
          <li>/</li>
          <li class="active"><i class="fa fa-table fa-fw"></i>&nbsp;Puskesmas</li>
           <li class="pull-right"><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>&nbsp;Logout</a></li>
           <li class="pull-right">/</li>
          <li class="pull-right"><i class="fa fa-user fa-fw"></i>&nbsp;<?php echo $data['Nama']; ?></a>
      </ol>
   </div>
<?php } ?>
<div class="col-md-10" style="min-height:600px">
<div class="row">
  <div class="col-xs-1"><!-- banner --></div>

<div class="col-xs-10" style="margin-top: 50px;">
<?php 

if(!empty($_GET['message']) && $_GET['message'] == 'success'){
    echo "<script>alert('data berhasil tersimpan');
document.location.href='puskesmas.php'; </script>";
}
?>
<?php
if(!empty($_GET['message']) && $_GET['message'] == 'suksesdelete'){
echo "<script>alert('data Sukses Di Hapus'); document.location.href='puskesmas.php'; </script>  ";
}
else if(!empty($_GET['message']) && $_GET['message'] == 'gagaldelete'){
echo "<script>alert('data Gagal Di Hapus'); document.location.href='puskesmas.php';</script> "; 
}
?>
<?php
if(!empty($_GET['message']) && $_GET['message'] == 'suksesedit'){
echo "<script>alert('data Sukses Di Edit'); document.location.href='puskesmas.php'; </script>  ";
}
?>




<table id="puskesmas" class="table table-stripped table-bordered">
  <thead>
    <tr>

<th>No</th>
<th>X</th>
<th>Y</th>
<th>Nama Puskesmas</th>
<th>Alamat</th>
<th>Kecamatan</th>
<th>Foto</th>
<th>Option</th>
    </tr>
    
  </thead>
  <tbody>
 <?php

$sql = "select*from puskesmas order by id";
$run = mysqli_query($koneksi,$sql);

 $no = 1;
  while($data = mysqli_fetch_array($run)){
   ?>
 
    <tr>
      <td><?php echo $no; ?></th>
 <td><?php echo $data['x']; ?></td>
<td><?php echo $data['y']; ?></td>     
<td><?php echo $data['keterangan']; ?></td>
<td><?php echo $data['alamat']; ?></td>
<td><?php echo $data['kecamatan']; ?></td>
<td><a href="<?php echo 'detailgambar.php?id='.$data['id'].'';?>" data-toggle="modal" data-target="#detailgambar"><img src="../assets/<?php echo $data['foto']; ?>" class="img-thumbnail"></a></td>

<td>
      <a href="<?php echo 'edit.php?id='.$data['id'].'';?>" data-toggle="modal" data-target="#editpuskesmas" class="btn btn-default btn-lg" title="Edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>   ||
      <a href="<?php echo 'indexdelete.php?id='.$data['id'].'';?>" data-toggle="modal" data-target="#deletepuskesmas" class="btn btn-default btn-lg" title="Delete"><span class="glyphicon glyphicon-trash" aria-hidden="true">
        </span></a>
    </td>

    </tr>
<?php 
  $no++;
} 
?>
</tbody>
</table>
</div>
<div class="col-xs-1"><!-- banner --></div>

</div>

</div>

   <div class="col-md-12" style="background:#1682ba;padding:8px;color:#fff;margin-top:100px; "><center>create by <a href="www.sikode.com" style="color:#fff">bayujunisp</a> &copy 2018</center></div>
</body>
<html>

<div id="deletepuskesmas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indexdelete" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
  
</div>
</div>
</div>

<div id="detailgambar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indexdelete" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
  
</div>
</div>
</div>


<div id="editpuskesmas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indexdelete" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
  
</div>
</div>
</div>
<script type="text/javascript">
    
    $(document).ready(function(){
           
      $('#puskesmas').DataTable();
});
</script>

