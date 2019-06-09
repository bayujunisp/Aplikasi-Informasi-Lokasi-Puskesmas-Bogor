<?php
include "koneksi.php";

?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Rute</title>
    <!-- load library place untuk geocoder autocomplete dan kita set bahasanya ke bahasa indonesia -->
    <link rel="stylesheet" href="assets/css/leaflet.css" /> <!-- memanggil css di folder leaflet -->
<link rel="stylesheet" href="assets/css/style.css" /> <!-- memanggil leaflet.js di folder leaflet -->
<script src="assets/js/jquery-3.2.1.min.js"></script> <!-- memanggil jquery di folder js -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
<script src="assets/js/bayuscript.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/click.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCc7FZQ6jG2VcxnxbMNdkPFFzrUsJxq-ys"></script>
  </head>
  <body>
  		<form action="rutefix.php" method="get" style="margin:auto; width: 20%;">
  <label>Cari Nama Puskesmas :</label>
   <select class="form-control" name="cari" id="cari" required="required">
                  <option value="0" selected disabled="true">--Nama Puskesmas--</option>
                  <?php  
                  $sql = "select*from puskesmas";
                  $run = pg_query($connect,$sql);
                  while($data = pg_fetch_assoc($run)){ ?>
                    <option value="<?php echo $data['keterangan']; ?>"><?php echo $data['keterangan']; ?></option>
                   <?php } ?>
                    
                </select><br>
  <input type="submit" value="cari" class="btn btn-success"">
  <input type="submit" value="Reset" class="btn btn-outline-dark">
  <?php 
if(isset($_GET['cari'])){
  $cari = $_GET['cari'];
  
  echo "<br><br><b>Hasil pencarian : ".$cari."</b>";
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
   navigator.geolocation.getCurrentPosition(function (position) {                                                              //This gets the
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
        $run1 = pg_query($connect,$sql1);
            while($data1 = pg_fetch_assoc($run1)){
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

       origin: coords,
       destination: destinasi,

       travelMode: google.maps.DirectionsTravelMode.DRIVING
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
	    <div id="panel" style="float:right; width:48%; height:600px;"></div>
	    <div id="map" style="width:50%; height:600px;"></div>
  </body>
</html>