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
   <li class="active"><a href="home.php"><i class="fa fa-home fa-fw"></i>&nbsp; Home</a></li>

   <li><a href="puskesmas.php"><i class="fa fa-table fa-fw"></i>&nbsp; Puskesmas</a>
      
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
         <li><i class="fa fa-home fa-fw"></i>&nbsp;Home</li>
          <li class="pull-right"><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>&nbsp;Logout</a></li>
           <li class="pull-right">/</li>
          <li class="pull-right"><i class="fa fa-user fa-fw"></i>&nbsp;<?php echo $data['Nama']; ?></a>
      </ol>
   </div>
<div class="col-md-10" style="min-height:600px">

  <h3><b>Selamat Datang</b>,<?php echo $data['Nama']; ?></h3>

  <br>
<div class="panel panel-default">
<div class="panel-heading"><h4><img src="../assets/image/sd.png" style="width:40px"> Profile Admin</h4></div>
<div class="panel-body">

<p><h4> <b>Nama     : </b><?php echo $data['Nama']; ?></h4></p>
<p><h4> <b>Username : </b><?php echo  $data['username']; ?></h4></p>
<p><h4> <b>Password : </b><?php echo  $data['password']; ?></h4></p>


<?php } ?>


</div>
<div class="panel-footer">
</div>
</div>
</div>

   <div class="col-md-12" style="background:#1682ba;padding:8px;color:#fff;"><center>create by <a href="www.sikode.com" style="color:#fff">bayujunisp</a> &copy 2018</center></div>
</body>
<html>

