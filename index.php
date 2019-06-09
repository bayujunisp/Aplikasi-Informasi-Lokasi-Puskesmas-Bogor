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
<script src="assets/js/bayuscript.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/click.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<script src="http://maps.google.com/maps/api/js?sensor=false&libraries=places&language=id"></script>
<meta charset="utf-8">
    <title>Info Puskesmas</title><link rel="icon" href="assets/image/favicon.ico">
     
         
</head>
<body>
<div id="home"></div>
<div class="container-fluid main">
  <nav class="navbar navbar-default" >
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span> 
        </button>
        <a class="navbar-brand" href="#home">HOME</a>
        
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="about"><a href="#about">ABOUT</a></li>
          <li class="map"><a href="#mapheader">LOCATION</a></li>
          <li class="contact"><a href="#footer">CONTACT</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div id="myCarousel" class="carousel carousel-fade slide" data-ride="carousel" data-interval="3000">
    <div class="carousel-inner" role="listbox">
      <div class="item active background a"></div>
      <div class="item background b"></div>
      <div class="item background c"></div>
    </div>

  </div>
  
  <div class="covertext">
  <a class="prev" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="next" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
    <div class="col-lg-10" style="float:none; margin:0 auto;">
      <h1 class="title">WELCOME</h1>
      <h3 class="subtitle">INFO PUSKESMAS WEBSITE</h3>
    </div>
    <div class="col-xs-12 explore">
      <a href="#about"><button type="button" class="btn btn-lg explorebtn">GET STARTED</button></a>
    </div>
  </div>
  
</div>

<div id="about">
<div class="aboutheader">
<h1>Apa Itu Puskesmas?</h1><h2></h2>
</div>

<div class="aboutcontent">
<div class="row">
<div class="col-xs-4"><!-- mantab --></div>
<div class="col-xs-4"><img src="assets/image/logo.png"></div>
<div class="col-xs-4"><!-- mantab --></div>
</div>
<h1> <b>Pusat Kesehatan Masyarakat</b>, disingkat <b>Puskesmas</b>, adalah organisasi fungsional yang menyelenggarakan upaya kesehatan yang bersifat menyeluruh, terpadu, merata, dapat diterima dan terjangkau oleh masyarakat, dengan peran serta aktif masyarakat dan menggunakan hasil pengembangan ilmu pengetahuan dan teknologi tepat guna, dengan biaya yang dapat dipikul oleh pemerintah dan masyarakat. Upaya kesehatan tersebut diselenggarakan dengan menitikberatkan kepada pelayanan untuk masyarakat luas guna mencapai derajad kesehatan yang optimal,tanpa mengabaikan mutu pelayanan kepada perorangan.</h1>
</div>

</div>
<div id="mapheader">
<h1>Location</h1><h2></h2>
<br><br><br>

<form action="index.php#mapheader" method="get" class="form-map">
  <label>Cari Nama Puskesmas :</label>
  <select class="form-control" name="cari" id="cari" required="required">
                 <option value="0">--Pilih Puskesmas--</option>
                  <?php 

                  $sql = "select*from puskesmas order by id";
                  $run = mysqli_query($koneksi,$sql);
                  while($data =  mysqli_fetch_array($run)){ 
                     ?>
                    <option value="<?php echo $data['keterangan']; ?>"><?php echo $data['keterangan']; ?></option>
                   <?php }  ?>
                    
                </select><br>
  <br>
  <input type="submit" value="Cari" class="btn btn-success"">
  <button name="Reset" class="btn btn-outline-dark">Reset</button>
</form>



 
<?php 
if(isset($_GET['cari'])){
  $cari = $_GET['cari'];
}
?>


</div>

<div id="map">
<div class="mapcontent">
 
   
            <div class="panel panel-default">
                <div class="panel-heading">Lokasi Puskesmas Di Kota Bogor</div>
                    <div class="panel-body">
                        <div id="map-canvas">
    
    <script>
        
    var marker;
      function initialize() {
          
        // Variabel untuk menyimpan informasi (desc)
        var infoWindow = new google.maps.InfoWindow;
        
        //  Variabel untuk menyimpan peta Roadmap
        var mapOptions = {
            center:new google.maps.LatLng(-6.595038, 106.816635),
           zoom:20,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        } 
        
        // Pembuatan petanya
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
              
        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();

        // Pengambilan data dari database
        <?php
        

     
    if(!isset($_GET['cari'])){
    $sql1 = "select*from puskesmas";
    
    }

  else if(isset($_GET['cari'])){
      
     $sql1 = "select*from puskesmas where keterangan like '%".$cari."%'";
           
     }
   else{
    $sql1 = "select*from puskesmas";
            
   }
   
   if(isset($_GET['Reset'])){
      
     $sql1 = "select*from puskesmas";
            
     }
   
    
        
          $run1 = mysqli_query($koneksi,$sql1);
         while($data1 =  mysqli_fetch_array($run1)){


                $nama = $data1['keterangan'];
                $alamat = $data1['alamat'];
                $lat = $data1['y'];
                $lon = $data1['x'];
                $id = $data1['id'];

                 
                echo ("addMarker($lat, $lon, '<b>$nama</b><br><b>$alamat</b><br><br><a href=detailpuskesmas.php?id=$id data-toggle=modal data-target=#detailpuskesmas>Info Detail</a>');\n");                        
            }
          ?>
         
        // Proses membuat marker 
        function addMarker(lat, lng, info) {
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            var marker = new google.maps.Marker({
                map: map,
                position: lokasi
            });       
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
         }
        
        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
 
        }
      google.maps.event.addDomListener(window, 'load', initialize);
    
    </script>
                        </div>
                    </div>
            </div>
  
  
  </div>

</div>
<div id="mapbutton">
<div class="lihatdata">
     <a href="data.php" class="btn btn-lg lihatdatabtn">Lihat Data</button></a>
     <a href="direction.php" class="btn btn-lg lihatdatabtn">Direction</button></a>
    </div>
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

<div id="detailpuskesmas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="indexdelete" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
  
</div>
</div>
</div>
