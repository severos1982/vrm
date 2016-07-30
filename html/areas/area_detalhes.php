<?php 

$area = $_GET['area'];

$servername = "localhost";
$username = "root";
$password = "root";
$bd = "vrm";

// Create connection
$conn = new mysqli($servername, $username, $password);

mysql_connect("$servername", "$username", "$password") or die(mysql_error());
mysql_select_db($bd) or die(mysql_error());

$result = mysql_query("SELECT are_codigo, are_nome, are_descricao, are_disponibilidade, set_codigo, set_nome, set_descricao FROM area,setor where are_codigo=" .$area." and are_setor=set_codigo");
$row = mysql_fetch_row($result);

mysql_close();
?>

<br>
<ul class="nav nav-tabs">
  <li role="presentation">
  	<a href="principal.php?pg=area" target="mainFrame">Áreas</a>
  	</li>
  <li role="presentation" class="active">
  	<a href="#" target="mainFrame">Detalhes da Área - <?php echo($row[5]. " - " .$row[1]); ?></a>
  </li>
</ul>
<br>

<div class="panel panel-default" style="width: 98%">
	<div class="panel-body">

		<form role="form" name="area_form" id="area_form" class="valida_form" method="post">
			
			<legend><?php echo($row[5]. " - " .$row[1]); ?></legend>
			<div class="form-group">
			 	<div class="input-group">
					<span class="input-group-addon">Pertence ao setor:</span>
					<select class="form-control" id="setor" name="setor">
					    <option value="<?php echo ($row[4]); ?>"><?php echo ($row[5]); ?> - <?php echo ($row[6]); ?></option>
						
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
     
    					while($row_setores = mysql_fetch_assoc($result)){
        					//echo "ID: ".$row['id'].", Nome:".$row['nome'].", Cidade:".$row['cidade'].", Idade:".$row['idade']."<br/>";
    						echo ("<option value='" .$row_setores['set_codigo']. "'>" .$row_setores['set_nome']. " - " .$row_setores['set_descricao']. "</option>");
    					}
						
    					mysql_close();
						
						?>
						
						
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Nome da Área: </span>
					<input class="form-control" value="<?php echo ($row[1]); ?>" id="nome" name="nome" placeholder="Informe o nome da Área">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Descrição: </span>
					<input class="form-control" value="<?php echo ($row[2]); ?>" id="descricao" name="descricao" placeholder="Informe uma descrição para Área">
				</div>
			</div>			
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Disponibilidade: </span>
					<input class="form-control" value="<?php echo ($row[3]); ?>" id="disponibilidade" name="disponibilidade" placeholder="Total de dias para disponibilidade dos videos desta Área">
				</div>
			</div>
            <div class="form-group">
            	<button type="submit" class="btn btn-success" onclick="atualiza()">
            		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Atualizar
            	</button> 
            	<button type="submit" class="btn btn-danger" onclick="exclui()">
            		<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Excluir
            	</button>
            </div>
            
            <input type="hidden" value="<?php echo ($area); ?>" id="codigo" name="codigo">
            								
		</form>			  
	</div>
</div>

<?php 

$servername = "localhost";
$username = "root";
$password = "root";
$bd = "vrm";

// Create connection
$conn = new mysqli($servername, $username, $password);

mysql_connect("$servername", "$username", "$password") or die(mysql_error());
mysql_select_db($bd) or die(mysql_error());

$areas = mysql_query("SELECT * FROM camera where cam_area=" .$area);

if(mysql_num_rows($areas) > 0 ) {
	
	echo("<div class='panel panel-default' style='width: 98%'>");
	echo("<div class='panel-heading'>");
	echo("<h4 class='panel-title'>");
	echo("<a data-toggle='collapse' href='#areas'>");
	echo("<span class='glyphicon glyphicon-chevron-down' aria-hidden='true'></span> Câmeras cadastradas nesta área</a></div>");
	echo("</h4>");
	echo ("<div id='areas' class='panel-collapse collapse'>");
	echo ("<table class='table table-striped'>");
	echo ("<tr>");
	echo ("<td width='15%'><strong><u>Área</u></strong></td>");
	echo ("<td width='40%'><strong><u>Descrição</u></strong></td>");
	echo ("<td width='45%'><strong><u>Url</u></strong></td>");
	echo ("</tr>");
	
	while($row = mysql_fetch_assoc($areas)){
		echo("<tr>");
		echo("<td width='25%' align='left'><a href='principal.php?pg=camera&acao=detalhes&camera=" .$row['cam_codigo']. "'>" .$row['cam_nome']. "</a></td>");
		echo("<td width='40%' align='left'>" .$row['cam_descricao']. "</td>");
		echo("<td width='35%' align='left'>" .$row['cam_url']. "</td>");
		echo("</tr>");
	}
	
	echo ("</table></div></div>");
}

echo(mysql_error());

mysql_close();

?>

<script type="text/javascript">

$(document).ready(function() {
    $('.valida_form').formValidation({
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        err: {
            container: 'tooltip'
        },
		
        fields: {
            'nome': {
                validators: {
                    notEmpty: {
                        message: 'Este campo é necessário'
                    }
                }
            },
	        'setor': {
	            validators: {
		           	notEmpty: {
		                    message: 'Selecione um setor'
		            },
	                integer: {
	                    message: 'Selecione um setor.'
	                }
	            }
	        },
            'area': {
                validators: {
                    notEmpty: {
                        message: 'Este campo é necessário'
                    }
                }
            },
            'disponibilidade': {
	            validators: {
	               notEmpty: {
	                    message: 'Informe o número de dias em que os videos desta área ficarão disponíveis'
	               },
                   integer: {
                       message: 'O número deve ser inteiro',
                       // The default separators
                       thousandsSeparator: '',
                       decimalSeparator: '.'
                   }
	            }
	        },   
        }
	})

});

function atualiza() { 
	document.area_form.action = "areas/area_atualiza_action.php";
	document.area_form.submit();
}

function exclui() { 
	document.area_form.action = "areas/area_exclui_action.php";
	document.area_form.submit();
}

</script>