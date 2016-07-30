<br>
<ul class="nav nav-tabs">
  <li role="presentation">
  	<a href="principal.php?pg=area" target="mainFrame">Áreas</a>
  	</li>
  <li role="presentation" class="active">
  	<a href="principal.php?pg=area&acao=nova" target="mainFrame">Cadastro</a>
  </li>
</ul>
<br>

<div class="panel panel-default" style="width: 90%">
	<div class="panel-body">

		<form role="form" class="valida_form" action="areas/area_cadastro_action.php" method="post">
			
			<legend>Nova Área</legend>
			<div class="form-group">
			 	<div class="input-group">
					<span class="input-group-addon">Pertence ao setor:</span>
					<select class="form-control" id="setor" name="setor">
					    <option>Selecione o setor ao qual pertence está Área.</option>
						
						<?php 
											
						$setor = $_POST['nome'];
						$descricao = $_POST['descricao'];
						
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
        					//echo "ID: ".$row['id'].", Nome:".$row['nome'].", Cidade:".$row['cidade'].", Idade:".$row['idade']."<br/>";
    						echo ("<option value='" .$row['set_codigo']. "'>" .$row['set_nome']. " - " .$row['set_descricao']. "</option>");
    					}
						
						mysql_close();
    					
						?>
						
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Nome da Área: </span>
					<input class="form-control" id="nome" name="nome" placeholder="Informe o nome da Área">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Descrição: </span>
					<input class="form-control" id="descricao" name="descricao" placeholder="Informe uma descrição para Área">
				</div>
			</div>			
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Disponibilidade: </span>
					<input class="form-control" id="disponibilidade" name="disponibilidade" placeholder="Total de dias para disponibilidade dos videos desta Área">
				</div>
			</div>
            <div class="form-group">
            	<button type="submit" class="btn btn-primary">
            		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Salvar
            	</button>
            </div>									
		</form>			  
	</div>
</div>

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
	                    message: 'Selecione um setor.',
	                    thousandsSeparator: '',
	                    decimalSeparator: '.'	                    
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
</script>