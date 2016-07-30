<br>
<ul class="nav nav-tabs">
  <li role="presentation">
  	<a href="principal.php?pg=camera" target="mainFrame">Cameras</a>
  	</li>
  <li role="presentation" class="active">
  	<a href="principal.php?pg=camera&acao=nova" target="mainFrame">Cadastro</a>
  </li>
</ul>
<br>

<div class="panel panel-default" style="width: 98%">
	<div class="panel-body">

		<form role="form" class="valida_form" action="cameras/camera_cadastro_action.php" method="post">
			
			<legend>Nova Camera</legend>

			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Nome da Camera: </span>
					<input class="form-control" id="nome" name="nome" placeholder="Informe o nome da Camera">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Descrição: </span>
					<input class="form-control" id="descricao" name="descricao" placeholder="Informe uma descrição para Camera">
				</div>
			</div>

			<div class="form-group">
			 	<div class="input-group">
					<span class="input-group-addon">Localizada na Área:</span>
					<select class="form-control" id="area" name="area">
					    <option>Selecione a Área.</option>
						
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
						
  						$result = mysql_query("SELECT are_codigo, set_nome, are_nome, are_descricao, set_nome FROM setor, area where set_codigo = are_setor order by set_codigo ASC");
     
    					while($row = mysql_fetch_assoc($result)){
        					//echo "ID: ".$row['id'].", Nome:".$row['nome'].", Cidade:".$row['cidade'].", Idade:".$row['idade']."<br/>";
    						echo ("<option value='" .$row['are_codigo']. "'>" .$row['set_nome']. " - " .$row['are_nome']. " - " .$row['are_descricao']. "</option>");
    					}
						
						
						?>
						
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">URL: </span>
					<input class="form-control" id="url" name="url" placeholder="Informe a URL da Camera">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Observação: </span>
					<input class="form-control" id="observacao" name="observacao" placeholder="Em caso de necessidade">
				</div>
			</div>	

			<div class="checkbox">
					<label><input type="checkbox" id="gravando" name="gravando" checked="checked">Gravar está camera</label>
			</div>	

			<div class="checkbox">
					<label><input type="checkbox" id="dome" name="dome" >É camera do tipo dome</label>
			</div>
			
			<br>
					
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
                        message: 'Informe um nome para Camera.'
                    }
                }
            },
	        'area': {
	            validators: {
	                integer: {
	                    message: 'Selecione uma Área.'
	                },
	                notEmpty: {
	                    message: 'Selecione uma Área.'
	                }
	            }
	        },
            'url': {
                validators: {
                    notEmpty: {
                        message: 'Informe a URL para Conexão RTSP da Camera.'
                    }
                }
            },     
        }
	})

});


</script>