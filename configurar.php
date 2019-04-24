<?php error_reporting(1);ini_set('error_reporting', E_ALL);

$lines=@file("includes/datos.txt");
$id=trim($lines["0"]);

if($_POST) {
	$nuevoarchivo9 = fopen('includes/datos.txt', "w+");
	fwrite($nuevoarchivo9,trim($_POST['id']),0777);
	fclose($nuevoarchivo9);

// CREAMOS ARCHIVO DE RESPALDO
function fOpenRequest($url) {
   $file = fopen($url, 'r');
   $data = stream_get_contents($file);
   fclose($file);
   return $data;
}
$fopenn = fOpenRequest('http://meteo.riotercero.tk/api2.php?id='.trim($_POST['id']).'');
$resultn = json_decode($fopenn, true);
$resultn = $resultn[0];
$nuevoarchivo9 = fopen('includes/db.txt', "w+");
fwrite($nuevoarchivo9,''.$resultn['Apiweb'].'
'.$resultn['Ciudad'].'',0777);
fclose($nuevoarchivo9);
header('Location: index.php');
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Datos del tiempo 2.6.5</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <style>
		.contiene { border-color:#CCC !important; border-width:thick !important; }
		.textos { margin-top:0px; margin-right:40% !important; max-width:250px;}
		.inputs { margin-top:0px; margin-left:40% !important; max-width:250px;}
		
		</style>
	</head>
	<body>
<div id="page-wrapper">
<?php include('includes/menu.php');?>
<article id="main">
						
							<center>
                            <h2>Configuracion</h2>
                            <p>Debes tener los siguientes dátos para ejecutar el programa.</p>
                            </center>
						
						<section class="wrapper style5">
<p>
<form method="post" name="form" class="popup-form" id="form" data-toggle="validator">
<div class="row">
<div id="msgContactSubmit" class="hidden"></div>
<div class="form-group col-sm-6">
<input name="id" id="id" placeholder="<?php if(empty($id)) { echo "Tu ID de Usuario*";} else { echo $id; }?>" class="form-control" type="text" required data-error="Por favor ingresa tu ID de Usuario"></div><!-- end form-group -->
<div class="form-group last col-sm-12">
<button type="submit" id="submit" class="btn btn-custom"><i class='fa fa-archive'></i> Enviar</button>
</div><!-- end form-group -->	
<span class="sub-text">* Campos requeridos</span>
<div class="clearfix"></div>
</div><!-- end row -->
</form><!-- end form -->
</div>
</div><!--End row -->
<!-- Popup end -->
</div><!-- end item-wrap -->
</div><!--End col -->
</div><!--End tab-content -->
</div><!--End row -->
</div><!--End container -->
        </p>
        <center><p>Para obtener el ID de Usuario debes ingresar a nuestra <a href="https://meteo.riotercero.tk/login.php" target="_blank">página web</a></p></center>
</div>
</section>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
	</body>
</html>