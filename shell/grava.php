<?php

$servername = "localhost";
$username = "root";
$password = "root";
$bd = "vrm";

// Create connection
$conn = new mysqli($servername, $username, $password);

mysql_connect("$servername", "$username", "$password") or die(mysql_error());
mysql_select_db($bd) or die(mysql_error());

$path =  mysql_fetch_row(mysql_query("SELECT con_valor from conf where con_chave='PATH'"));
$duracao = mysql_fetch_row(mysql_query("SELECT con_valor from conf where con_chave='DURAÇÃO'"));
$timezone = mysql_fetch_row(mysql_query("SELECT con_valor from conf where con_chave='TIMEZONE'"));
$duracao_video = (int)$duracao[0] * 60;
$duracao_video = $duracao_video + 20;

date_default_timezone_set($timezone);
//$date = date('Y-m-d H:i');
//echo $date;

$ano = date('Y');
$mes = date('m');
$dia = date('d');
$hora = date('H_i');

if ($mes == 01) {
	$mes = "01_JANEIRO";

}else if($mes == 02) {
	$mes = "02_FEVEREIRO";

}else if($mes == 03) {
	$mes = "03_MARCO";

}else if($mes == 04) {
	$mes = "04_ABRIL";

}else if($mes == 05) {
	$mes = "05_MAIO";

}else if($mes == 06) {
	$mes = "06_JUNHO";

}else if($mes == 07) {
	$mes = "07_JULHO";

}else if($mes == 08) {
	$mes = "08_AGOSTO";

}else if($mes == 09) {
	$mes = "09_SETEMBRO";

}else if($mes == 10) {
	$mes = "10_OUTUBRO";

}else if($mes == 11) {
	$mes = "11_NOVEMBRO";

}else {
	$mes = "12_DEZEMBRO";
}

$cameras = mysql_query("SELECT cam_codigo, cam_nome, cam_gravando, cam_url, are_nome, set_nome from camera,area,setor where cam_area=are_codigo and are_setor=set_codigo and cam_gravando=1");

while($row = mysql_fetch_assoc($cameras)) {
	
	$dir = $path[0]. "/" .$ano. "/" .$mes. "/" .$dia. "/" .$row['set_nome']. "/" .$row['are_nome']. "/" .$row['cam_nome']. "/";
	$dir = str_replace(" ", "_", $dir);
	
	if (!file_exists($dir)) {
		mkdir($dir, 0777, true);
	}
		
	$arquivo = $row['cam_nome']. "-" .$dia. "_" .$mes. "_" .$ano. "__" .$hora. ".mp4"; 
	$arquivo = str_replace(" ","_", $arquivo);
	
	$sql = "insert into arquivos_camera (arq_camera, arq_arquivo) values (" .$row['cam_codigo']. ", '" .$arquivo. "')";  
	$result = mysql_query($sql);
		
	$arquivo = $dir . $arquivo;
	
	$comando = "/usr/bin/vlc -I dummy " .$row['cam_url']. " --sout '#transcode{}:duplicate{dst=std{access=file,mux=mp4,dst={" .$arquivo. "}}}' --run-time='" .$duracao_video. "' --stop-time='" .$duracao_video. "' vlc://quit ";
	exec($comando. " > /dev/null &");

}

exec("/bin/chmod 777 -R " .$path[0]);

mysql_close();

?>
