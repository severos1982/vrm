<link rel="stylesheet" href="../css/style.css" type="text/css" media="screen"/>
<script type="text/javascript" src="../js/redips-drag-min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>

<br>
<ul class="nav nav-tabs">
  	
  	<li role="presentation">
  		<a href="principal.php?pg=mosaicos" target="mainFrame">Mosaicos</a>
	</li>
  	
  	<li role="presentation" class="active">
  		<a href="#" target="mainFrame">Novo Mosaico</a>
	</li>
  		
</ul>
<br>

<div class="panel panel-default" style="width: 99%">
	
	<div class="panel-body">
		<legend>Novo Mosaico</legend>
		
		<!-- tables inside this DIV could have draggable content -->
		<div id="redips-drag" style="width: 100%;">
		
		<div id="left" style="width: 650px;" class="col-md-8 panel" style="display:none;">
			
		    <div id="alertacameras"></div>

			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Nome do Mosaíco: </span>
					<input class="form-control" id="nome" name="nome" placeholder="Informe um nome para o Mosaíco">
				</div>
			</div>			
			
			<table id="table3" name="table3" class="maintd" style="width: 100%; height: 200px">
				<colgroup>
					<col width="360"/>
					<col width="360"/>
				</colgroup>
				<tbody>
					<tr>
						<td id="td1"></td>
						<td id="td2" class="upper_right"></td>
					</tr>
					<tr>
						<td id="td3" class="lower_left"></td>
						<th id="td4"></th>
					</tr>
				</tbody>
			</table>
			<br>
			<div class="form-group">
            	<button type="submit" class="btn btn-primary" onclick="salvaMosaico()">
            		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Salvar
            	</button>
            </div>
		</div>
	
		<!-- right container -->
		<div id="right" style="height: 320px; width: 340px;" class="col-md-4 panel">
			<table id="table">
				<colgroup><col width="100"/><col width="100"/></colgroup>
				<tbody>
					    <?php 
					    
					    $servername = "localhost";
					    $username = "root";
					    $password = "root";
					    $bd = "vrm";
					    
					    // Create connection
					    $conn = new mysqli($servername, $username, $password);
					    
					    mysql_connect("$servername", "$username", "$password") or die(mysql_error());
			  			mysql_select_db($bd) or die(mysql_error());
					    
					    $cameras = mysql_query("SELECT cam_codigo, cam_nome, are_nome, set_nome FROM camera, area, setor where cam_area=are_codigo and are_setor=set_codigo");
						
					    $flag = 0;
					    
					    while($row = mysql_fetch_assoc($cameras)){
					    		
					    	if($flag % 2 == 0) {
						    	echo ("<tr>");
						    	echo ("<td>");
						    	echo ("<div class='redips-drag redips-clone'>");
						    	echo ($row['cam_codigo']. " - " .$row['cam_nome']. " - " .$row['are_nome']. " - " .$row['set_nome']);
						    	echo ("</div>");
						    	echo ("</td>");
						    
						    }else {
						    	echo ("<td>");
						    	echo ("<div class='redips-drag redips-clone'>");
						    	echo ($row['cam_codigo']. " - " .$row['cam_nome']. " - " .$row['are_nome']. " - " .$row['set_nome']);
						    	echo ("</div>");
						    	echo ("</td>");
						    	echo ("</tr>");
						    	
					    	}
					    	
					    	$flag++;
					    }
					    
					    mysql_close();
					    
					    ?>

				</tbody>
			</table>
		</div>

		</div><!-- drag container -->
	<!-- needed for cloning DIV elements -->
	<div id="redips_clone"></div>
	</div>
</div><!-- main container -->

<script type="text/javascript"> 

function salvaMosaico() { 

	var cam01 = getCodigo(td1.textContent); 
	var cam02 = getCodigo(td2.textContent);
	var cam03 = getCodigo(td3.textContent); 
	var cam04 = getCodigo(td4.textContent);

 	var nome_mosaico = document.getElementById("nome"); 	
 	var erro = "";

 	if(nome_mosaico.value == null || nome_mosaico.value == "") {
		erro += "<br>Informe um nome para o mosaico";
 	}
 	
	if(cam01 == null || cam01 == "") { 
		erro += "<br>Preencha o quadrado 1 com uma camera";
	}
 	
	if(cam02 == null || cam02 == "") {
		erro += "<br>Preencha o quadrado 2 com uma camera";
	}
	
 	if(cam03 == null || cam03 == "") {
		erro += "<br>Preencha o quadrado 3 com uma camera";
 	}
	
	if(cam04 == null || cam04 == "") {
		erro += "<br>Preencha o quadrado 4 com uma camera";
	}
	
	if(erro != "") {
		addAlert(erro);
		
	}else {
		window.location.href = "mosaicos/novo_2x2_action.php?cam01=" +cam01+ "&cam02=" +cam02+ "&cam03=" +cam03+ "&cam04=" +cam04+ "&nome=" +nome_mosaico.value;
	}
}

function addAlert(message) {
    $('#alertacameras').append(
        '<div class="alert alert-danger fade in">' +
            '<button type="button" class="close" data-dismiss="alert">' +
            '&times;</button><strong>Erro(s): </strong>' + message + '</div>');
}

function getCodigo(camera) { 

	var tmp = "";
	var i = 0;
	while(i < camera.length) {

		if(camera.charAt(i) == " ") {
			tmp = camera.substr(0, (i));
			break;
		}
		i++;
	}
	return tmp;
}

</script>