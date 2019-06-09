<?php
require_once"koneksi.php";
$sql = "select*from puskesmas order by id";
$run = mysqli_query($koneksi,$sql);
?>
<!DOCTYPE html>
<html>
<head>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="assets/css/leaflet.css" /> <!-- memanggil css di folder leaflet -->
<link rel="stylesheet" href="assets/css/style.css" /> <!-- memanggil css di folder leaflet -->
<script src="assets/js/leaflet.js"></script> <!-- memanggil leaflet.js di folder leaflet -->
<script src="assets/js/jquery-3.2.1.min.js"></script> <!-- memanggil jquery di folder js -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<script src="assets/js/scroll.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/click.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<script src="assets/js/search.js"></script>
<meta charset="utf-8">
    <title>Info Puskesmas</title><link rel="icon" href="assets/image/favicon.ico">

       
</head>
<body>
<div id="home"></div>
<div class="container-fluid main">
  <nav class="navbar navbar-default"
   style="background-image:none;
  background-color: rgb(102, 102, 102); /* Make the menu become transparent */
  border-radius: 0px;
  border: 1;
  box-shadow: none;
  padding: 10px;
  position: fixed;" >
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span> 
        </button>
        <a class="navbar-brand" href="index.php">HOME</a>
        
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="about"><a href="index.php">ABOUT</a></li>
          <li class="map"><a href="index.php">LOCATION</a></li>
          <li class="contact"><a href="data.php#footer">CONTACT</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div id="map" style="margin-top: 50px;">
  <div id="mapheader">
<h1>Data Puskesmas Di Kota Bogor</h1><h2></h2>
</div>
<div class="col-xs-1"><!-- banner --></div>

<div class="col-xs-10">
<div class="form-group pull-right">
    <input type="text" class="search form-control" placeholder="Search">
</div>
<span class="counter pull-right"></span>
<table class="table table-hover table-bordered results">
  <thead>
    <tr>
      <th>No</th>
<th>Nama Puskesmas</th>
<th>Alamat</th>
<th>Foto</th>
    </tr>
    <tr class="warning no-result">
      <td colspan="4"><i class="fa fa-warning"></i> No result</td>
    </tr>
  </thead>
  <tbody>
 <?php
 $no = 1;
  while($data = mysqli_fetch_array($run)){
   ?>
 
    <tr>
      <th scope="row"><?php echo $no; ?></th>
      
<td><?php echo $data['keterangan']; ?></td>
<td><?php echo $data['alamat']; ?></td>
<td><img src="assets/<?php echo $data['foto']; ?>" width="300px" height="212px;"></td>

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
<div id="mapbutton">

</div>

<button onclick="topFunction()" id="atas" title="Kembali Ke Atas"><span class="glyphicon glyphicon-chevron-up"></span></button>

<footer>
<div id="footer"></div>
<div class="footerheader">
<a href="#home"> Home </a>
<a href="mailto:bayupribadi37@gmail.com">  Email </a>
<a href="https://goo.gl/maps/8LJvhraBPz22"> Address </a>
</div>

<div class="kontak">
<div class="row">

<div class="col-xs-3">
<a href="https://www.facebook.com/bayu.pribadi.9">
<img src="assets/image/facebook.png" width="50px" height="50px">  
</a>
</div>

<div class="col-xs-3">
<a href="https://twitter.com/BayuJunisP">
  <img src="assets/image/twitter.png" width="50px" height="50px">
  </a>  
</div>

<div class="col-xs-3">
  <a href="https://instagram.com/bayujunisp">
  <img src="assets/image/instagram.png" width="50px" height="50px"> 
  </a>
</div>

<div class="col-xs-3">
<a href="https://plus.google.com/112867173614993531320">
  <img src="assets/image/googleplus.png" width="50px" height="50px">
  </a>  
</div>

</div>  
</div>

<div class="copyrights">
<p>&copy;2018 BAYU JUNIS PRIBADI. All rights reserved.</p>
</div>

</footer>
</body>
</html>

 