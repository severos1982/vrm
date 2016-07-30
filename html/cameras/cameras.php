<br>
<ul class="nav nav-tabs">
  <li role="presentation" class="active">
  	<a href="principal.php?pg=camera" target="mainFrame">Cameras</a>
  	</li>
  <li role="presentation">
  	<a href="principal.php?pg=camera&acao=nova" target="mainFrame">Cadastro</a>
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
		    
		    $setores = mysql_query("SELECT * FROM setor");
		    
		    $count = 0;
		    
		    while($row_setores = mysql_fetch_assoc($setores)){
		    	
		    	$cameras = mysql_query("select cam_codigo, cam_nome, cam_url, cam_descricao, are_nome, are_descricao from camera, area, setor
		    			where cam_area=are_codigo and are_setor=set_codigo and set_codigo=" .$row_setores['set_codigo']);
		    	
		    	if(mysql_num_rows($cameras) > 0 ) {
		    	
			       	echo ("<div class='panel panel-default' style='width: 98%'>");
			    	echo ("<div class='panel-heading'><strong>SETOR: " .$row_setores['set_nome']. " - " .$row_setores['set_descricao']. "</strong></div>");
			       	echo ("<table class='table table-striped'>");
			    	echo ("<tr>");
			    	echo ("<td width='3%'>#</td>");
			    	echo ("<td width='37%'><u>CÂMERA</u></td>");
			    	echo ("<td width='30%'><u>URL</u></td>");
			    	echo ("<td width='30%'><u>LOCALIZADO NA ÁREA</u></td>");
			    	echo ("</tr>");
			    	    	
			    	while($row_cameras = mysql_fetch_assoc($cameras)) {
				    	
			    		$count++;
			    		
				    	echo("<tr>");
				    	echo("<td width='3%'>" .$count. "</td>");
				    	echo("<td width='37%' align='left'><a href='principal.php?pg=camera&acao=detalhes&camera=" .$row_cameras['cam_codigo']. "'>" .$row_cameras['cam_nome']. " - ".$row_cameras['cam_descricao']. "</a></td>");
				    	echo("<td width='30%' align='left'>" .$row_cameras['cam_url']. "</td>");
				    	echo("<td width='30%' align='left'>" .$row_cameras['are_nome']. " - " .$row_cameras['are_descricao']. "</td>");
				    	echo("</tr>");
			    	} 
			    	
			    	echo ("</table></div></div>");
			    
		    	}
		    }
		       
		   mysql_close();
		   ?>

