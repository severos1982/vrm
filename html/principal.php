<!DOCTYPE HTML>
<html>
<head>

<link rel="stylesheet" href="../css/bootstrap.css"/>
<link rel="stylesheet" href="../css/formValidation.css"/>

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/formValidation.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
<?php 
	
	$pg = $_GET['pg'];
	$acao = $_GET['acao'];
	
	session_start();
	
	$logado = $_SESSION["login"];
	
	if($logado == "") {
		header('location: login.php');
	
	}else {
	
		if($pg == "camera") {
			
			if($acao == "nova") {
				include 'cameras/camera_cadastro.php';
		
			}else if($acao == "detalhes") {
				include 'cameras/camera_detalhes.php';
				
			}else {
				include 'cameras/cameras.php';
	
			}
			
		}else if($pg == "setor") { 
			
			if($acao == "novo") { 
				include 'setores/setor_cadastro.php';
			
			}else if ($acao == "detalhes") {
				include 'setores/setor_detalhes.php';
			
			}else {
				include 'setores/setor.php';
			}
			
		}else if($pg == "area") {
			
			if($acao == "nova") {
				include 'areas/area_cadastro.php';	
	
			}else if ($acao == "detalhes") {
				include 'areas/area_detalhes.php';
				
			}else {
				include 'areas/area.php';
			}
		
		}else if($pg == "conf") {
			include 'conf/conf.php';
		
		}else if($pg == 'arquivos') {
			
			if($acao == "pesquisa") {
				include 'arquivos/resultado_pesquisa_arquivos.php';
			
			}else {
				include 'arquivos/pesquisa_arquivos.php';
			}
		
		}else if($pg == 'mosaicos') {
			
			if($acao == "novo") {
				include 'mosaicos/novo_2x2.php';
			
			}else {
				include 'mosaicos/mosaicos.php';
			}
	
		}else if($pg == "info") {
			include 'info/info.php';
	
		}else if($pg == "sobre") {
			include 'info/sobre.php';
		
		}else if($pg == "versao") {
			include 'info/versao.php';
			
		}else if($pg == "funcionamento") {
			include 'info/funcionamento.php';
			
		}else {
			include 'arquivos/pesquisa_arquivos.php';
		}

	}
?>

</body>
</html>
