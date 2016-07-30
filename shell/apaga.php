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
$timezone = mysql_fetch_row(mysql_query("SELECT con_valor from conf where con_chave='TIMEZONE'"));

date_default_timezone_set($timezone);
$hoje = date('Y-m-d');

$areas = mysql_query("select are_codigo, are_nome, are_disponibilidade, set_nome from area,setor where are_setor=set_codigo");

while($row_areas = mysql_fetch_assoc($areas)) {
	
	// APAGAR DIRETORIO
	$apagar = date('Y-m-d', strtotime("-".$row_areas['are_disponibilidade']." days", strtotime($hoje)));
	
	// APAGA BD 
	$apagarbd = date('Y-m-d', strtotime("-".((int)$row_areas['are_disponibilidade'] - 1)." days", strtotime($hoje)));
	
	
	/**	
	echo("APAGAR DIR: " .$apagar. " AREA: " .$row_areas['are_codigo']. " DISP: ".$row_areas['are_disponibilidade']. "<br>");
	
	echo("delete arquivos_camera from arquivos_camera left join (camera, area) 
				 on (arq_camera=cam_codigo and cam_area=" .$row_areas['are_codigo']. ")
				 where arq_time<'" .$apagarbd. "' and are_codigo=".$row_areas['are_codigo']);
	
	echo("<br><br>");
	*/
	
	mysql_query("delete arquivos_camera from arquivos_camera left join (camera, area)
				 on (arq_camera=cam_codigo and cam_area=" .$row_areas['are_codigo']. ")
				 where arq_time<'" .$apagarbd. "' and are_codigo=".$row_areas['are_codigo']);
	
	$dia  = substr($apagar, 8, 2);
	$mes  = substr($apagar, 5, 2);
	$ano  = substr($apagar, 0, 4);
	 
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
	 	
	$comando_apagar = $path[0]. "/" .$ano. "/" .$mes. "/" .$dia. "/" .$row_areas['set_nome']. "/" .$row_areas['are_nome'];
	$comando_apagar = "/bin/rm -rf " .$comando_apagar;
	
	exec($comando_apagar);
	
	echo(mysql_error());
	
	
}

mysql_close();

?>
