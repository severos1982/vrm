<?php 

session_start();
session_unset();
session_destroy();

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>VRM - Autenticação</title>
</head>

<link rel="stylesheet" href="../css/bootstrap.css"/>
<link rel="stylesheet" href="../css/formValidation.css"/>

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/formValidation.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>

<style type="text/css">
body {
	background-color: #333333;
}
</style>

<body leftmargin="0" topmargin="0">


<br><br><br><br><br><br><br>

<table align="center" style="width: 40%;">

<tr>
<td>
	<div class="panel panel-primary">
	<div class="panel-heading">
	<h4 class='panel-title'><strong>VRM - Autenticação</strong></h2>
	</div>
	<div class="panel-body">

		<form role="form" class="valida_form" action="faz_login.php" method="post">

			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Login:</span>
					<input type="text" name="login" id="login" placeholder="Informe o login" class="form-control" aria-describedby="nome">
				</div>
			</div>
			
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon" >Senha:</span>
					<input type="password" name="senha" id="senha" placeholder="Informe a senha" class="form-control" aria-describedby="senha">
				</div>
			</div>

            <div class="form-group">
            	<button type="submit" class="btn btn-primary">
            		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Acessar
            	</button>
            </div>			
		
		</form>

	</div>
</td>
</tr>

</table>

</body>
</html>

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
            'login': {
                validators: {
                    notEmpty: {
                        message: 'Informe o login'
                    }
                }
            },
            'senha': {
                validators: {
                    notEmpty: {
                        message: 'Informe a Senha'
                    }
                }
            },
        }
	})

});
</script>