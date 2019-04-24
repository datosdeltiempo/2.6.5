<?php error_reporting(0);ini_set('error_reporting', E_ALL);error_reporting(0);
//actualizamos la pagina cada 15 minutos
header("Refresh: 900; URL='index.php'");
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
	</head>
	<body class="landing">
<div id="page-wrapper">
<?php include('includes/menu.php');?>
<section id="banner">
	<div class="inner">
		<h2>Datos del Tiempo</h2>
		<p><?php include('includes/datos.php');?></p>

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