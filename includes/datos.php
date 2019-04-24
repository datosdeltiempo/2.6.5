<?php
$lines=file("includes/db.txt");
$id=$lines[0];
$ciudad=$lines[1];
if(!empty($id)) {
// Mostramos los datos en pantalla
echo "<br/>";
$patron='http://api.openweathermap.org/data/2.5/weather?id='.trim($ciudad).'&appid='.trim($id).'&lang=es';
$json_file = @file_get_contents($patron);
$vars = json_decode($json_file);
$cond = $vars->main;
$ciudadp = $vars->name;
$presion = $cond->pressure;
$hum= $cond->humidity;
$temp_c = $cond->temp - 273.15;
$temp_f = 32 + 1.8 * ($cond->temp - 273.15);
$weather = $vars->weather;
$descripcion = $weather[0]->description;
$icon = $weather[0]->icon;
$cond = $vars->clouds;
$nubes = $cond->all;
echo $ciudadp.'<BR /><img src="imgs/'.$icon.'.png"><BR />Temperatura:'.intval($temp_f).'&deg;F | '.intval($temp_c).'&deg;C<BR />Humedad: '.$hum.'%<BR /><br>Presion Atmosferica:'.$presion.'<br>El cielo: '.$descripcion.'<br>'.$nubes.'% de nubes.
<BR />';
// Abrimos y creamos currentweather.html para sobreescribir los datos del tiempo
$ruta=str_replace("/","\\",$_SERVER['DOCUMENT_ROOT']."./Currenweather/");
$nuevoarchivo1 = fopen(''.$ruta.'/currenweather.html', "w+");
fwrite($nuevoarchivo1,"<HTML>
<br>
".$ciudadp."<BR /><img src='../imgs/".$icon.".png'>
<BR />
Temperature:".intval($temp_f)."&deg;F/".intval($temp_c)."&deg;C<BR />
Humidity: ".$hum."%<BR />
Presion Atmosferica:".$presion."<br>
El cielo: ".$descripcion."<br>
".$nubes."% de nubes.
</HTML>");

fclose($nuevoarchivo1);
// Creamos currentweather.txt con los datos del tiempo.
$nuevoarchivo2 = fopen(''.$ruta.'/currenweather.txt', "w+");
fwrite($nuevoarchivo2, intval($temp_c)." ".$hum,0777);fclose($nuevoarchivo2);
} else { echo "Debe configurar el ID de Usuario <a href='configurar.php'>->Menu->Configurar</a>."; 
}
?>