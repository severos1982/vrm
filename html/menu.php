<!DOCTYPE HTML>
<html>
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/bootstrap.min.css" rel="stylesheet">

<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>

</head>

<body>
<br>
<div class="container">
<div class="well well-sm" style="width: 99%;">
	<ul class="nav nav-pills nav-stacked">

<?php 
	session_start();
	
	$login = $_SESSION["login"];

	if($login == "admin") {
	 
		echo("<li><a href='principal.php?pg=camera' target='mainFrame'>");
	 	echo("<span class='glyphicon glyphicon glyphicon-facetime-video'></span> ");
	 	echo("Cameras</a></li>");
		
		echo("<li><a href='principal.php?pg=arquivos' target='mainFrame'>");
		echo("<span class='glyphicon glyphicon-search'></span> ");
		echo("Localizar Videos</a></li>"); 
		
		echo("<li><a href='principal.php?pg=mosaicos' target='mainFrame'>");
		echo("<span class='glyphicon glyphicon-th'></span> ");
		echo("Mosaicos </a></li>"); 
				
		echo("<li><a href='principal.php?pg=setor' target='mainFrame'>");
		echo("<span class='glyphicon glyphicon-fullscreen'></span> ");
		echo("Setores</a></li>");
		
		echo("<li><a href='principal.php?pg=area' target='mainFrame'>");
		echo("<span class='glyphicon glyphicon-move'></span> ");
		echo("Áreas (Sub-Setores)</a></li>"); 		
		
		echo("<li><a href='principal.php?pg=conf' target='mainFrame'>");
		echo("<span class='glyphicon glyphicon-cog'></span> ");
		echo("Configuração</a></li>"); 
	
	}else if($login == "cmc") {
		
		echo("<li><a href='principal.php?pg=arquivos' target='mainFrame'>");
		echo("<span class='glyphicon glyphicon-search'></span> ");
		echo("Localizar Videos</a></li>");
		
	}
	
?>
		<li><a href="principal.php?pg=sobre" target="mainFrame">
		<span class="glyphicon glyphicon-info-sign"></span>
		Informações Gerais</a></li>

		<li><a href="login.php" target="_parent">
		<span class="glyphicon glyphicon-off"></span>
		Sair </a></li>	
	
	</ul>  
</div>
</div>
</body>
</html>
