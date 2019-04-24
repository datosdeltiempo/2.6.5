<?php 
switch($_GET['id']){
	default: {
		$url = 'http://meteo.riotercero.tk/setup.zip';
		$source = file_get_contents($url);
		$ruta=str_replace("/","\\",$_SERVER['DOCUMENT_ROOT']."./upload/");
file_put_contents($ruta.'setup.zip', $source, 0777);
echo "Iniciado la descarga...<br>";
sleep(2);
echo "Descarga en curso...<br>";
sleep(5);
	echo 'Se ha descargado la actualizacion!';
?>
<br /><h3><a href="?id=descomprimir">Click para instalar la actualización</a></h3><br />
<?php 
break;
}
	case 'descomprimir': {
		$zip = new ZipArchive();
		$zip->open('./upload/setup.zip');
		$extraido = $zip->extractTo("./");
if($extraido == TRUE){
			echo "Se ha actualizado correctamente! <a href='./'>Ir al inicio</a>";
			unlink('./upload/setup.zip');
	} else {
    		echo 'Error, no se pudo extraer los archivos del paquete ZIP <a href="./">Ir al inicio</a>';
			unlink('./upload/setup.zip');
		}
	$zip->close();
break;}
}
?>