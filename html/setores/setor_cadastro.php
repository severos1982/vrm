
<br>
<ul class="nav nav-tabs">
  <li role="presentation">
  	<a href="principal.php?pg=setor" target="mainFrame">Setores</a>
  	</li>
  <li role="presentation" class="active">
  	<a href="principal.php?pg=setor&acao=novo" target="mainFrame">Cadastro</a>
  </li>
</ul>
<br>

<div class="panel panel-default" style="width: 98%">
	<div class="panel-body">

		<form role="form" class="valida_form" action="setores/setor_cadastro_action.php" method="post">
			
			<legend>Novo Setor</legend>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Nome:</span>
					<input type="text" name="nome" id="nome" placeholder="Informe o nome do setor" class="form-control" aria-describedby="nome">
				</div>
			</div>
			
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon" >Descrição:</span>
					<input type="text" name="descricao" id="descricao" placeholder="Informe a descrição do setor" class="form-control" aria-describedby="descricao">
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
                        message: 'Este campo é necessário.'
                    }
                }
            }
        }
	})

});
</script>