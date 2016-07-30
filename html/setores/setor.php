<br>
<ul class="nav nav-tabs">
  <li role="presentation" class="active">
  	<a href="principal.php?pg=setor" target="mainFrame">Setores</a>
  	</li>
  <li role="presentation">
  	<a href="principal.php?pg=setor&acao=novo" target="mainFrame">Cadastro</a>
  </li>
</ul>
<br>

<table style="width: 98%">
	<tr>
		<td>
		
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading"><strong>Setores Existentes</strong></div>
		
		  	<!-- Table -->
		  	<table class="table table-striped">
		    
		    	<tr>
		    		<td><strong><u>Setor</u></strong></td>
		    		<td><strong><u>Descrição</u></strong></td>
		    	</tr>
		    <?php 
		    
		    $servername = "localhost";
		    $username = "root";
		    $password = "root";
		    $bd = "vrm";
		    
		    // Create connection
		    $conn = new mysqli($servername, $username, $password);
		    
		    mysql_connect("$servername", "$username", "$password") or die(mysql_error());
  			mysql_select_db($bd) or die(mysql_error());
		    
		    $result = mysql_query("SELECT * FROM setor");
		     
		    while($row = mysql_fetch_assoc($result)){
		    
		    	echo("<tr>");
		    	echo("<td><a href='principal.php?pg=setor&acao=detalhes&setor=" .$row['set_codigo']. "'>" .$row['set_nome']. "</a></td>");
		    	echo("<td>" .$row['set_descricao']. "</td>"); 
		    	echo("</tr>");
		    }
		    
		    ?>
		    
		    </table>
		</div>
		
		</td>
	</tr>
</table>
