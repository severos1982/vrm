<?php

$camera = strtoupper($_POST['nome']);
$descricao = strtoupper($_POST['descricao']);
$area = $_POST['area'];
$url = strtolower($_POST['url']);
$obs = strtoupper($_POST['observacao']);

$gravando = null;
$dome = null;

if(isset($_POST['gravando'])) { 
	$gravando = 1;
	
}else {
	$gravando = 0;
}

if(isset($_POST['dome'])) {
	$dome = 1;

}else {
	$dome = 0;
}

$servername = "localhost";
$username = "root";
$password = "root";
$bd = "vrm";

// Create connection
$conn = new mysqli($servername, $username, $password);

mysql_connect("$servername", "$username", "$password") or die(mysql_error());
mysql_select_db($bd) or die(mysql_error());

$sql = "insert into camera (cam_nome, cam_descricao, cam_area, cam_url, cam_observacao, cam_gravando, cam_dome) 
				values ('" .$camera. "', '" .$descricao. "', " .$area. ", '" .$url. "', '" .$obs. "', " .$gravando.", " .$dome. ")";

$result = mysql_query($sql);

if ($result){ // verifica se o resultado é positivo, portanto se o comando foi executado;
	header('location: ../principal.php?pg=camera');
	
} 

?>

<link rel="stylesheet" href="../../css/bootstrap.css"/>
<link rel="stylesheet" href="../../css/formValidation.css"/>

<script type="text/javascript" src="../../js/jquery.min.js"></script>
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../js/formValidation.js"></script>
<script type="text/javascript" src="../../js/bootstrap.js"></script>

<br>
<ul class="nav nav-tabs">
  <li role="presentation">
  	<a href="../principal.php?pg=camera" target="mainFrame">Cameras</a>
  	</li>
  <li role="presentation" class="active">
  	<a href="../principal.php?pg=camera&acao=nova" target="mainFrame">Cadastro</a>
  </li>
</ul>
<br>
<div class="panel panel-default" style="width: 90%">
	<div class="panel-body"> 
	
		<div class="alert alert-danger" role="alert">
  			<span class="glyphicon glyphicon-remove"></span>
  			ERRO: <?php echo(mysql_error()); ?>
		</div>
		
		 <button type="button" class="btn btn-default" onclick="goBack()">Voltar</button>
	</div>
</div>

<script>
function goBack() {
    window.history.back();
}
</script>

<?php mysql_close(); ?>
