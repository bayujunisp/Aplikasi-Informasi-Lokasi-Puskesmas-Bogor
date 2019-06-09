<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="../assets/js/jquery-3.2.1.min.js"></script> <!-- memanggil jquery di folder js -->
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
<script src="../assets/js/bayuscript.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/click.js"></script>
<meta charset="utf-8">
    <title>Administrator</title><link rel="icon" href="../assets/image/favicon.ico">
     
         
</head>
<body>
<div id="home"></div>
<br> <br> <br>
<div class="col-xs-3"><!-- banner --></div>
<div class="col-xs-6">
<div class="panel panel-primary" style="margin-top: 100px; box-shadow: 5px 5px 5px rgb(102, 102, 102);">
<div class="panel-heading"><img src="../assets/image/sd.png" width="50" class="img responsive">LOGIN</div>
<div class="panel-body">
<div class="container">
<form name="login" action="otentikasi.php" method="post" class="form-horizontal">
<div class="form-group">

<label class="control-label col-sm-2" for="user">Username :</label>
<div class="col-sm-3">
<input type="text" name="username" placeholder="masukan usename" class="form-control" id="user">
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-2" for="pwd">Password :</label>
<div class="col-sm-3">
<input type="password" name="password" placeholder="masukan password" class="form-control" id="pwd">
</div>
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-5">
<button type="submit" class="btn btn-success" value="login">Submit</button> 
<button type="reset" class="btn btn-danger" value="reset">Cancel</button>
</div>
</div>
</form>
</div></div>
</div>
</div>
<div class="col-xs-3"><!-- banner --></div>


</body>
</html>