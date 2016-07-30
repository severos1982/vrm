<br>
<ul class="nav nav-tabs">
  <li role="presentation" class="active">
  	<a href="principal.php?pg=conf" target="mainFrame">Configurações</a>
  </li>
</ul>
<br>

<div class="panel panel-default" style="width: 90%">
	<div class="panel-body">

		<form role="form" name="area_form" id="area_form" class="valida_form" method="post">
			
			<legend>Configurações</legend>

			<?php 
			
			$servername = "localhost";
			$username = "root";
			$password = "root";
			$bd = "vrm";
			
			// Create connection
			$conn = new mysqli($servername, $username, $password);
			
			mysql_connect("$servername", "$username", "$password") or die(mysql_error());
			mysql_select_db($bd) or die(mysql_error());
			
			$result = mysql_query("SELECT * from conf");
			
			while($row = mysql_fetch_assoc($result)){
			
			echo("<div class='form-group'>");
			echo("<div class='input-group'>");
			echo("<span class='input-group-addon'>" .$row['con_chave']. ":</span>");
			echo("<input type='text' value='" .$row['con_valor']. "' name='" .$row['con_chave']. "' id='" .$row['con_chave']. "' class='form-control' aria-describedby='" .$row['con_chave']. "'>");
			echo("</div>");
			echo("</div>");
			
			}
			
			mysql_close(); 
			
			?>
			
			<div class="form-group">
            	<button type="submit" class="btn btn-success" onclick="atualiza()">
            		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Atualizar
            	</button> 
            </div>
            
            								
		</form>			  
	</div>
</div>

<br><br><br><br>

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
            'PATH': {
                validators: {
                    notEmpty: {
                        message: 'Informe o caminho onde os videos serão salvos'
                    }
                }
            },
	        'TIMEZONE': {
	            validators: {
		           	notEmpty: {
		                    message: 'Informe o Timezone'
		            }
	            }
	        },
            'DURAÇÃO': {
                validators: {
                    notEmpty: {
                        message: 'Informe o tempo em minutos de duração dos videos'
                    },
                    integer: {
                        message: 'Deve ser um valor inteiro'
                    }
                }
            },
        }
	})

});

function atualiza() { 
	document.area_form.action = "conf/conf_atualiza_action.php";
	document.area_form.submit();
}

</script>