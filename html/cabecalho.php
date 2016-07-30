<?php 
	session_start();
	
	$login = $_SESSION["login"];

?>

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

<style type="text/css">

table {
    background-color: #030303;
}

.titulo {
	font-family:arial;
	font-size:20px;
	color:#eeeeee;
}

</style>
</head>
<body topmargin="0" leftmargin="0">
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
    	<!-- Brand and toggle get grouped for better mobile display -->
    	<div class="navbar-header">
      		<p class="navbar-text"><strong>VRM - SISTEMA DE GESTÃO DE VIDEO</strong></p> 
    	</div>
     
		<div class="collapse navbar-collapse">
     		<p class="navbar-text navbar-right">
     			<span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
				<a href="#" class="navbar-link"><?php echo($login); ?></a>
			</p>
     	</div>
	</div>
</nav>
  
</body>
</html>
