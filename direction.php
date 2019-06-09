<?php
include 'koneksi.php';
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
<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCc7FZQ6jG2VcxnxbMNdkPFFzrUsJxq-ys&libraries=places&language=id"></script>
<meta charset="utf-8">
    <title>Info Puskesmas</title><link rel="icon" href="assets/image/favicon.ico">

       
</head>
<body>

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

<div id="home" style="height: 100%;"></div>
  <div id="mapheader">
<h1>Data Puskesmas Di Kota Bogor</h1><h2></h2>
</div>

<div class="col-xs-1"><!-- banner --></div>

<div class="col-xs-10">
<form action="direction.php" method="get" class="form-map">
  <label>Cari Nama Puskesmas :</label>
   <select class="form-control" name="cari" id="cari" required="required">
                 
                  <?php 

                  $sql = "select*from puskesmas order by id";
                  $run = mysqli_query($koneksi,$sql);
                  while($data = mysqli_fetch_array($run)){ 
                     ?>
                    <option value="<?php echo $data['keterangan']; ?>"><?php echo $data['keterangan']; ?></option>
                   <?php }  ?>
                    
                </select><br>
                <div class="col-xs-4"><!-- banner  --></div>
                <div class="col-xs-4">
  <input type="submit" value="cari" class="btn btn-success" >
  <!-- banner  --></div>
  <div class="col-xs-4"><!-- banner  --></div>
  <br><br>
  <?php 
if(isset($_GET['cari'])){
  $cari = $_GET['cari'];
  
  echo "<br><br><b>Hasil pencarian</b><br>";
  echo "<b>".$cari."</b>";
}
?>
</form>


<?php 
if(isset($_GET['cari'])){
      
     $sql1 = "select*from puskesmas where keterangan like '%".$cari."%'";
           
     }else{

    $sql1 = "select*from puskesmas where id='1'";
         
     }
      if(isset($_GET['Reset'])){
      
     $sql1 = "select*from puskesmas where id='1'";
            
     }
       ?>

 <script>
    if (navigator.geolocation) { //Checks if browser supports geolocation
  
   
   navigator.geolocation.getCurrentPosition(function (position) {         
       

   
                                                      //This gets the
     var latitude = position.coords.latitude;                    //users current
     var longitude = position.coords.longitude;                 //location
     var coords = new google.maps.LatLng(latitude, longitude);
     var directionsService = new google.maps.DirectionsService(); //Creates variable for map 
     var directionsDisplay = new google.maps.DirectionsRenderer();

     var mapOptions = //Sets map options
     {
       zoom: 15,  //Sets zoom level (0-21)
       center: coords, //zoom in on users location
       mapTypeControl: true, //allows you to select map type eg. map or satellite
       navigationControlOptions:
       {
         style: google.maps.NavigationControlStyle.SMALL //sets map controls size eg. zoom
       },
       mapTypeId: google.maps.MapTypeId.ROADMAP //sets type of map Options:ROADMAP, SATELLITE, HYBRID, TERRIAN
     };
     
      
     var tujuan = [
        <?php
        $run1 = mysqli_query($koneksi,$sql1);
            while($data1 = mysqli_fetch_array($run1)){
          ?>
     ['<?php echo $data1['keterangan'];?>',<?php echo $data1['y']; ?>,<?php echo $data1['x']; ?>]
     <?php } ?>
     ];
     for (i = 0; i < tujuan.length; i++) {
     var destinasi = new google.maps.LatLng(tujuan[i][1],tujuan[i][2]);
     map = new google.maps.Map( /*creates Map variable*/ document.getElementById("map"), mapOptions /*Creates a new map using the passed optional parameters in the mapOptions parameter.*/);
     directionsDisplay.setMap(map);
     directionsDisplay.setPanel(document.getElementById('panel'));
       
     var request = {

       origin: coords, // untuk daerah asal, kita ambil value dari lokasi kita
       destination: destinasi, // untuk daerah tujuan, kita ambil value dari textbox tujuan

     provideRouteAlternatives:true, // set true, karena kita ingin menampilkan rute alternatif

            /**
             * kamu bisa tambahkan opsi yang lain seperti
             * avoidHighways:true (set true untuk menghindari jalan raya, set false untuk menonantifkan opsi ini)
             * atau kamu bisa juga menambahkan opsi seperti
             * avoidTolls:true (set true untuk menghindari jalan tol, set false untuk menonantifkan opsi ini)
             */
            travelMode: google.maps.TravelMode.DRIVING // set mode DRIVING (mode berkendara / kendaraan pribadi)
            /**
             * kamu bisa ganti dengan 
             * google.maps.TravelMode.BICYCLING (mode bersepeda)
             * google.maps.TravelMode.WALKING (mode berjalan)
             * google.maps.TravelMode.TRANSIT (mode kendaraan / transportasi umum)
             */
     };
}
     directionsService.route(request, function (response, status) {
       if (status == google.maps.DirectionsStatus.OK) {
         directionsDisplay.setDirections(response);
       }
     });
   });

 }
    </script>

      <br>
      <div id="panel"></div>
      <div id="map" style="width:50%; height:600px;"></div>
</div>
<div class="col-xs-1"><!-- banner --></div>

 </div>


<div id="mapbutton" style="margin-bottom: 600px;">
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

 