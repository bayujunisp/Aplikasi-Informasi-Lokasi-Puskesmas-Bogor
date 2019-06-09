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

   <style type="text/css">
     

.nav-colored { background-color:#FFF; }
.nav-transparent { background-color:rgba(255,255,255,0.5);}

   </style>
<meta charset="utf-8">
   <script src="../assets/js/jquery-3.2.1.min.js"></script> <!-- memanggil jquery di folder js -->
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
<script src="../assets/js/bayuscript.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/click.js"></script>

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

   <li><a href="puskesmas.php"><i class="fa fa-table fa-fw"></i>&nbsp; Puskesmas</a>
      
    <li  class="active"><a href="tambah.php"><i class="fa fa-plus fa-fw"></i>&nbsp; Input Data</a></li>

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
          <li class="active"><i class="fa fa-plus fa-fw"></i>&nbsp;Input Data</li>
          <li class="pull-right"><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>&nbsp;Logout</a></li>
           <li class="pull-right">/</li>
          <li class="pull-right"><i class="fa fa-user fa-fw"></i>&nbsp;<?php echo $data['Nama']; ?></a>
      </ol>
   </div>
   
<?php } ?>
<div class="col-md-10" style="min-height:600px;">
<div id="inputdata">
 


<form name="inputdata" action="insert.php" method="post" class="form-horizontal" enctype="multipart/form-data">

 <div class="form-group">
 <div class="col-sm-10">
<h1>Input Data Puskesmas</h1>
<h2></h2>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2" for="jdl">Nilai Longtitude :</label>
<div class="col-sm-7">
<input type="text" name="x" placeholder="Longtitude" class="form-control" id="jdl" required="required">
</div>
</div>


<div class="form-group">
<label class="control-label col-sm-2" for="jdl">Nilai Latitude :</label>
<div class="col-sm-7">
<input type="text" name="y" placeholder="Latitude" class="form-control" id="jdl" required="required">
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2" for="jdl">Nama Puskesmas :</label>
<div class="col-sm-7">
<input type="text" name="keterangan" placeholder="Nama" class="form-control" id="jdl" required="required">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2" for="ft">Foto :</label>
<div class="col-sm-7">
*Ukuran foto Max 2MB
<br>
<input type="file" name="foto" id="foto" required="required">


</div>
</div> 
<div class="form-group">
<label class="control-label col-sm-2" for="is">alamat :</label>
<div class="col-sm-7">
<textarea class="form-control" name="alamat" cols="80" rows="20"></textarea>
</div>
</div>

<br>
<div class="form-group">
<label class="control-label col-sm-2" for="trans">Kecamatan :</label>
 <div class="col-sm-7">
 <select class="form-control" name="kecamatan" id="trans" required="required">
                  <option value="0" selected disabled="true">--kecamatan--</option>
                    <option value="Bogor Tengah">Bogor Tengah</option>
                    <option value="Bogor Barat">Bogor Barat</option>
                    <option value="Bogor Timur">Bogor Timur</option>
                    <option value="Bogor Utara">Bogor Utara</option>
                    <option value="Bogor Selatan">Bogor Selatan</option>
                   <option value="Tanah Sareal">Tanah Sareal</option>
                    
                </select>
            </div>
            </div>
<br>
<br>


<div class="form-group">
<div class="col-sm-offset-5 col-sm-7">
<br>
<br>
<br>
<button type="submit" class="btn btn-success" value="simpan">Submit</button> 
<button type="reset" class="btn btn-danger" value="reset">Cancel</button>
</div>
</div>

</div>
</form>
</div>
</div>

   <div class="col-md-12" style="background:#1682ba;padding:8px;color:#fff;margin-top: 50px;"><center>create by <a href="www.sikode.com" style="color:#fff">bayujunisp</a> &copy 2018</center></div>
</body>
<html>

