<?php 

$cam1 = $_GET['cam01']; 
$cam2 = $_GET['cam02'];
$cam3 = $_GET['cam03'];
$cam4 = $_GET['cam04'];
$nome = strtoupper($_GET['nome']);

$servername = "localhost";
$username = "root";
$password = "root";
$bd = "vrm";

// Create connection
$conn = new mysqli($servername, $username, $password);

mysql_connect("$servername", "$username", "$password") or die(mysql_error());
mysql_select_db($bd) or die(mysql_error());

$sql = "insert into grid (gri_nome) values ('" .$nome. "')";
$result = mysql_query($sql);

if ($result){ // verifica se o resultado é positivo, portanto se o comando foi executado;
	
	$grid = mysql_fetch_row(mysql_query("SELECT gri_codigo from grid where gri_nome='" .$nome. "'"));
	
	$result = mysql_query("insert into grid_view (grv_grid, grv_camera) values(" .$grid[0].  ", " .$cam1. ")");
	$result = mysql_query("insert into grid_view (grv_grid, grv_camera) values(" .$grid[0].  ", " .$cam2. ")");
	$result = mysql_query("insert into grid_view (grv_grid, grv_camera) values(" .$grid[0].  ", " .$cam3. ")");
	$result = mysql_query("insert into grid_view (grv_grid, grv_camera) values(" .$grid[0].  ", " .$cam4. ")");
		
	header('location: ../principal.php?pg=mosaicos');
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
  	<a href="../principal.php?pg=mosaicos" target="mainFrame">Mosaicos</a>
  	</li>
  <li role="presentation" class="active">
  	<a href="../principal.php?pg=mosaicos&acao=novo" target="mainFrame">Novo Mosaico</a>
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