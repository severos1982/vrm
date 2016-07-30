<?php 

$setor = $_GET['setor'];

$servername = "localhost";
$username = "root";
$password = "root";
$bd = "vrm";

// Create connection
$conn = new mysqli($servername, $username, $password);

mysql_connect("$servername", "$username", "$password") or die(mysql_error());
mysql_select_db($bd) or die(mysql_error());


$result = mysql_query("SELECT * FROM setor where set_codigo=" .$setor);
$row = mysql_fetch_row($result);

?>

<br>
<ul class="nav nav-tabs">
  <li role="presentation">
  	<a href="principal.php?pg=setor" target="mainFrame">Setores</a>
  	</li>
  <li role="presentation" class="active">
  	<a href="#" target="mainFrame">Detalhes do Setor - <?php echo ($row[1]); ?></a>
  </li>
</ul>
<br>

<div class="panel panel-default" style="width: 98%">
	<div class="panel-body">

		<form role="form" name="setor_form" id="setor_form" class="valida_form" method="post">
			
			<legend><?php echo ($row[1]); ?></legend>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Nome:</span>
					<input type="text" value="<?php echo ($row[1]); ?>" name="nome" id="nome" placeholder="Informe o nome do setor" class="form-control" aria-describedby="nome">
				</div>
			</div>
			
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon" >Descrição:</span>
					<input type="text" value="<?php echo ($row[2]); ?>" name="descricao" id="descricao" placeholder="Informe a descrição do setor" class="form-control" aria-describedby="descricao">
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
			
			<input type="hidden" value="<?php echo ($setor); ?>" id="codigo" name="codigo">
				
		</form>			  
	</div>
</div>

<?php 

$areas = mysql_query("SELECT * FROM area where are_setor=" .$setor);

if(mysql_num_rows($areas) > 0 ) {
	
	echo("<div class='panel panel-default' style='width: 98%'>");
	echo("<div class='panel-heading'>");
	echo("<h4 class='panel-title'>");
	echo("<a data-toggle='collapse' href='#areas'>");
	echo("<span class='glyphicon glyphicon-chevron-down' aria-hidden='true'></span> Áreas cadastradas neste setor</a></div>");
	echo("</h4>");
	echo ("<div id='areas' class='panel-collapse collapse'>");
	echo ("<table class='table table-striped'>");
	echo ("<tr>");
	echo ("<td width='15%'><strong><u>Área</u></strong></td>");
	echo ("<td width='40%'><strong><u>Descrição</u></strong></td>");
	echo ("<td width='45%'><strong><u>Disponibilidade</u></strong></td>");
	echo ("</tr>");
	
	while($row = mysql_fetch_assoc($areas)){
		echo("<tr>");
		echo("<td width='15%' align='left'><a href='principal.php?pg=area&acao=detalhes&area=" .$row['are_codigo']. "'>" .$row['are_nome']. "</a></td>");
		echo("<td width='40%' align='left'>" .$row['are_descricao']. "</td>");
		echo("<td width='45%' align='left'>" .$row['are_disponibilidade']. " dias</td>");
		echo("</tr>");
	}
	
	echo ("</table></div></div>");
}

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
                        message: 'Este campo é necessário.'
                    }
                }
            }
        }
	})

});

function atualiza() { 
	document.setor_form.action = "setores/setor_atualiza_action.php";
	document.setor_form.submit();
}

function exclui() { 
	document.setor_form.action = "setores/setor_exclui_action.php";
	document.setor_form.submit();
}

</script>