<?php

$usuario = $_POST['login'];
$senha = $_POST['senha'];

session_start();

if($usuario == "admin") {
	
	if($senha == "monitoration") {
		$_SESSION["login"] = "admin";
		
		header('location: ../html/');
		
	}
	
}else if($usuario == "cmc") { 
	
	if($senha == "cmc") { 
		$_SESSION["login"] = "cmc";
		header('location: ../html/');	
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>VRM - Autenticação</title>
</head>

<link rel="stylesheet" href="../css/bootstrap.css"/>
<link rel="stylesheet" href="../css/formValidation.css"/>

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/formValidation.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>

<style type="text/css">
body {
	background-color: #333333;
}
</style>

<body leftmargin="0" topmargin="0">


<br><br><br><br><br><br><br>

<table align="center" style="width: 40%;">

<tr>
<td>
	<div class="panel panel-primary">
	<div class="panel-heading">
	<h4 class='panel-title'><strong>VRM - Autenticação</strong></h2>
	</div>
	<div class="panel-body">
	
		<div class="alert alert-danger alert-dismissible" role="alert">
	  		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  		<strong>ERRO: </strong> Usuário ou senha inválida.
		</div>
	
	    <div class="form-group">
            <button type="submit" class="btn btn-primary" onclick="goBack()">
            	<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Voltar
            </button>
        </div>	

	</div>
</td>
</tr>

</table>

</body>
</html>

<script>
function goBack() {
    window.history.back();
}
</script>
