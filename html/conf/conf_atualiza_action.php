<?php

$path = $_POST['PATH'];
$duracao = $_POST['DURAÇÃO'];
$timezone = $_POST['TIMEZONE'];

$servername = "localhost";
$username = "root";
$password = "root";
$bd = "vrm";

// Create connection
$conn = new mysqli($servername, $username, $password);

mysql_connect("$servername", "$username", "$password") or die(mysql_error());
mysql_select_db($bd) or die(mysql_error());

$sql = "update conf set con_valor='" .$path. "' where con_chave='PATH'";
$result = mysql_query($sql);

$sql = "update conf set con_valor='" .$timezone. "' where con_chave='TIMEZONE'";
$result = mysql_query($sql);

$sql = "update conf set con_valor='" .$duracao. "' where con_chave='DURAÇÃO'";
$result = mysql_query($sql);


if ($result){ // verifica se o resultado é positivo, portanto se o comando foi executado;
	header('location: ../principal.php?pg=cameras');
} 

mysql_close();
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
  	<a href="../principal.php?pg=setor" target="mainFrame">Áreas</a>
  	</li>
  <li role="presentation" class="active">
  	<a href="../principal.php?pg=setor&acao=novo" target="mainFrame">Cadastro</a>
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

