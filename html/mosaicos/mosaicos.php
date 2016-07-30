<br>
<ul class="nav nav-tabs">
  	<li role="presentation" class="active">
  		<a href="#" target="mainFrame">Mosaicos</a>
	</li>
  	<li role="presentation" >
  		<a href="principal.php?pg=mosaicos&acao=novo" target="mainFrame">Novo Mosaico</a>
	</li>
  		
</ul>
<br> 

<?php 
		    
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $bd = "vrm";
		    
    // Create connection
    $conn = new mysqli($servername, $username, $password);
		    
    mysql_connect("$servername", "$username", "$password") or die(mysql_error());
	mysql_select_db($bd) or die(mysql_error());
		    
    $grid = mysql_query("SELECT * FROM grid");
		     
	while($row_grid = mysql_fetch_assoc($grid)){
		    	
		$cameras = mysql_query("select grv_camera from grid_view where grv_grid=" .$row_grid['gri_codigo']);
		
		echo("<div class='panel-group'>");
		echo("<div class='panel panel-default' style='width: 99%'>");
		echo("<div class='panel-heading'>");
		echo("<h4 class='panel-title'>");
		echo("<a data-toggle='collapse' href='#" .$row_grid['gri_codigo']. "'>");
		echo("<span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span></a> ");
		echo(" <a href='mosaicos/mosaico_exclui_action.php?mos=" .$row_grid['gri_codigo']. "'>");
		echo("<span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a> ");
		echo(" <a href='mosaicos/exibe_2x2.php?mos=" .$row_grid['gri_codigo']. "' target='_blank'>");
		echo("<span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span> ");
		echo(" " .$row_grid['gri_nome']. "</a>");
		echo("</h4></div>");

		echo("<div id='" .$row_grid['gri_codigo']. "' class='panel-collapse collapse'>");
	  	echo("<ul class='list-group'>");
	  	
		while($row_cameras = mysql_fetch_assoc($cameras)) {
			//echo($row_cameras['grv_camera']. "<br>");
			
			$camera = mysql_fetch_assoc(mysql_query("select cam_nome, cam_descricao, are_nome, set_nome from camera, area, setor where cam_codigo=" .$row_cameras['grv_camera']));
			
			echo("<li class='list-group-item'>");
			echo("<a href='principal.php?pg=camera&acao=detalhes&camera=1' target='mainFrame'>");
			echo("<span class='glyphicon glyphicon-facetime-video' aria-hidden='true'></span> ");
			echo($camera['cam_nome']. " - " .$camera['cam_descricao']. " - " .$camera['are_nome']. " - " .$camera['set_nome']. "<br>");
			echo("</a>");
			echo("</li>");
		}
		
		echo("</ul>");
		echo("</div>");
		echo("</div>");
		echo("</div>");
	}
		
	mysql_close();
?>
