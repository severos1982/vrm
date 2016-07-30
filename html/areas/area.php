<br>
<ul class="nav nav-tabs">
  <li role="presentation" class="active">
  	<a href="principal.php?pg=area" target="mainFrame">Áreas</a>
  	</li>
  <li role="presentation">
  	<a href="principal.php?pg=area&acao=nova" target="mainFrame">Cadastro</a>
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
		     
		    while($row_setores = mysql_fetch_assoc($setores)){
		    	
		    	$areas = mysql_query("select * from area where are_setor=" .$row_setores['set_codigo']);

		    	echo ("<div class='panel panel-default' style='width: 98%'>");
		    	echo ("<div class='panel-heading'><strong>" .$row_setores['set_nome']. "</strong> - " .$row_setores['set_descricao']. "</div>");
		    	echo ("<table class='table table-striped'>");
		    	echo ("<tr>");
		    	echo ("<td width='15%'><strong><u>Área</u></strong></td>");
		    	echo ("<td width='40%'><strong><u>Descrição</u></strong></td>");
		    	echo ("<td width='45%'><strong><u>Disponibilidade</u></strong></td>");
		    	echo ("</tr>");
		    	
		    	while($row_areas = mysql_fetch_assoc($areas)) {
			    	
			    	echo("<tr>");
			    	echo("<td width='15%' align='left'><a href='principal.php?pg=area&acao=detalhes&area=" .$row_areas['are_codigo']. "'>" .$row_areas['are_nome']. "</a></td>");
			    	echo("<td width='40%' align='left'>" .$row_areas['are_descricao']. "</td>");
			    	echo("<td width='45%' align='left'>" .$row_areas['are_disponibilidade']. " dias</td>");
			    	echo("</tr>");
		    	}
		    	
		    	echo ("</table></div>");
		    }
		    
		    mysql_close();
		    
		    ?>
