<?php 

	$inicio = $_POST['inicio'];
	$fim = $_POST['fim'];
	$setor = $_POST['setor'];
	$area = $_POST['area'];
	$camera = $_POST['camera'];
	
	$dia_inicio  = substr($inicio, 0, 2);
	$mes_inicio  = substr($inicio, 3, 2);
	$ano_inicio  = substr($inicio, 6, 4);
	$hora_inicio = substr($inicio, 10, 12);
	
	$dia_fim  = substr($fim, 0, 2);
	$mes_fim  = substr($fim, 3, 2);
	$ano_fim  = substr($fim, 6, 4);
	$hora_fim = substr($fim, 10, 12);
	
	$inicio = $ano_inicio. "-" .$mes_inicio. "-" .$dia_inicio." " .$hora_inicio;
	$fim = $ano_fim. "-" .$mes_fim. "-" .$dia_fim." " .$hora_fim;
	
	$sql = ""; 
	
	if($setor == "-") {
		
		$sql = "select arq_arquivo, arq_time, cam_nome, are_nome, set_nome 
				from arquivos_camera, camera, area, setor 
				where arq_camera=cam_codigo and cam_area=are_codigo and are_setor=set_codigo and arq_time>='$inicio' and arq_time<='$fim'  
				order by arq_time ASC";
		
	}else {
		
		if ($area == "-") {
		
			$sql = "select arq_arquivo, arq_time, cam_nome, are_nome, set_nome 
				from arquivos_camera, camera, area, setor
				where arq_camera=cam_codigo and cam_area=are_codigo and are_setor=set_codigo and set_codigo=$setor and arq_time>='$inicio' and arq_time<='$fim'  
				order by arq_time ASC";
		
		}else {
			
			if($camera == "-") {
				
				$sql = "select arq_arquivo, arq_time, cam_nome, are_nome, set_nome 
					from arquivos_camera, camera, area, setor 
					where arq_camera=cam_codigo and cam_area=are_codigo and are_setor=set_codigo and are_codigo=$area and arq_time>='$inicio' and arq_time<='$fim' 
					order by arq_time ASC";
			
			}else {
				
				$sql = "select arq_arquivo, arq_time, cam_nome, are_nome, set_nome 
					from arquivos_camera, camera, area, setor
					where arq_camera=cam_codigo and cam_area=are_codigo and are_setor=set_codigo and cam_codigo=$camera and arq_time>='$inicio' and arq_time<='$fim' 
 
					order by arq_time ASC";	
			}
		}
	}
	
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$bd = "vrm";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password);
	
	mysql_connect("$servername", "$username", "$password") or die(mysql_error());
	mysql_select_db($bd) or die(mysql_error());
	
	$result = mysql_query($sql);
	
	//mysql_close();
	echo(mysql_error());
?>

<br>
<ul class="nav nav-tabs">
  <li role="presentation">
  	<a href="principal.php?pg=arquivos" target="mainFrame">Localizar Video</a>
  </li>
  <li role="presentation" class="active">
  	<a href="#" target="mainFrame">Resultado da Pesquisa </a>
  </li>

</ul>
<br>

<div class="panel panel-default" style="width: 99%">
	<div class="panel-heading"><strong>Resultado da Pesquisa</strong>
	</div>
  	<table class="table table-striped">
		    
		<tr>
			<td><strong><u>Arquivo</u></strong></td>
		    <td><strong><u>Setor / Área / Camera</u></strong></td>
		    <td><strong><u>Data / Hora</u></strong></td>
		</tr>	

		<?php 
		
			while($row_arq = mysql_fetch_assoc($result)) {
				
				$dia  = substr($row_arq['arq_time'], 8, 2);
				$mes  = substr($row_arq['arq_time'], 5, 2);
				$ano  = substr($row_arq['arq_time'], 0, 4);
				
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
				
				
				$url_path = "/" .$ano. "/" .$mes. "/" .$dia. "/" .$row_arq['set_nome']. "/" .$row_arq['are_nome']. "/" .$row_arq['cam_nome']. "/";
				$url_path = str_replace(" ", "_", $url_path);
				
				echo("<tr>");
				echo("<td><a href='/videos" .$url_path . $row_arq['arq_arquivo']. "' target='_blank'><span class='glyphicon glyphicon-film' aria-hidden='true'></span> " .$row_arq['arq_arquivo']. "</a></td>");
				echo("<td>" .$row_arq['set_nome']. " - " .$row_arq['are_nome']. " - " .$row_arq['cam_nome']. "</td>");
				echo("<td>" .$row_arq['arq_time']. "</td>");
				echo("</tr>");
				
			}
		
		?>

	</table>

</div>
	
