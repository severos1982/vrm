<?php 

$servername = "localhost";
$username = "root";
$password = "root";
$bd = "vrm";

// Create connection
$conn = new mysqli($servername, $username, $password);

mysql_connect("$servername", "$username", "$password") or die(mysql_error());
mysql_select_db($bd) or die(mysql_error());

$result = mysql_query("SELECT count(*) as total from camera");
$n_cam = mysql_fetch_assoc($result);

$result = mysql_query("SELECT count(*) as total from camera where cam_gravando=1");
$n_grav = mysql_fetch_assoc($result);

$result = mysql_query("SELECT count(*) as total from camera");
$n_cam = mysql_fetch_assoc($result);

$result = mysql_query("SELECT count(*) as total from camera");
$n_cam = mysql_fetch_assoc($result);

$result = mysql_query("SELECT count(*) as total from arquivos_camera");
$n_arq = mysql_fetch_assoc($result);

$result = mysql_query("SELECT count(*) as total from setor");
$n_set = mysql_fetch_assoc($result);

$result = mysql_query("SELECT count(*) as total from area");
$n_are = mysql_fetch_assoc($result);

mysql_close();
?>

<br>

<ul class="nav nav-tabs">
	<li role="presentation">
  		<a href="principal.php?pg=sobre" target="mainFrame">Sobre o Sistema</a>
	</li>
	<li role="presentation" class="active">
		<a href="principal.php?pg=info" target="mainFrame">Estatísticas</a>
	</li>
	<li role="presentation">
		<a href="principal.php?pg=versao" target="mainFrame">Notas de Versão</a>
	</li>
</ul>

<br>

<div class="panel panel-default" style="width: 98%">
	<div class="panel-body">
	<legend>Estatísticas</legend> 
	
		N° de Câmeras Cadastradas: <strong><?php echo($n_cam['total']); ?></strong><br>
		N° de Câmeras com modo de gravação habilitado: <strong><?php echo($n_grav['total']); ?></strong><br> 
		N° de Arquivos de video encontrados: <strong><?php echo($n_arq['total']); ?></strong><br><br>
		
		N° de Setores Cadastrados: <strong><?php echo($n_set['total']); ?></strong><br>
		N° de Áreas Cadastradas: <strong><?php echo($n_are['total']); ?></strong><br>
		
		<br>	
	</div>
</div>
