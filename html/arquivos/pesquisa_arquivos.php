<link rel="stylesheet" href="../css/bootstrap-datetimepicker.css">
<script type="text/javascript" src="../js/moment-with-locales.js"></script>
<script type="text/javascript" src="../js/bootstrap-datetimepicker.js"></script>

<br>
<ul class="nav nav-tabs">
  <li role="presentation" class="active">
  	<a href="principal.php?pg=arquivos" target="mainFrame">Localizar Video</a>
  	</li>
</ul>
<br>

<div class="panel panel-default" style="width: 98%">
	<div class="panel-heading"><strong>Localizar Arquivos de Video</strong>
	</div>
	<div class="panel-body">

		<form role="form" class="form-inline" name="pesquisa_form" id="pesquisa_form" action="principal.php?pg=arquivos&acao=pesquisa" method="post">
	
			<div class="form-group">
				<div class='input-group date' id='datainicio'>
		            <span class="input-group-addon">
		            	DE:
		            </span>					
					<input type='text' id="inicio" name="inicio" class="form-control" placeholder="dd/mm/aaaa hh:mm"/>
		            <span class="input-group-addon">
		            	<span class="glyphicon glyphicon-calendar"></span>
		            </span>
				</div>
			</div>
		        
		    <script type="text/javascript">
		    	$(function () {
		        	$('#datainicio').datetimepicker({
		            	locale: 'pt_BR'
		            });
		        });
		    </script>

			<div class="form-group">
				<div class='input-group date' id='datafim'>
		            <span class="input-group-addon">
		            	ATÉ:
		            </span>
		        	<input type='text' id="fim" name="fim" class="form-control" placeholder="dd/mm/aaaa hh:mm"/>
		            <span class="input-group-addon">
		            	<span class="glyphicon glyphicon-calendar"></span>
		            </span>
				</div>
			</div>
		        
		    <script type="text/javascript">
		    	$(function () {
		        	$('#datafim').datetimepicker({
		            	locale: 'pt_BR'
		            });
		        });
		    </script>
			
			</p></p>
					
			<div class="form-group">
			 	<div class="input-group">
					<span class="input-group-addon">SETOR:</span>
					<select class="form-control" id="setor" name="setor" onclick="habilitaArea()">
						
						<option value="-">TODOS OS SETORES</option>
						
						<?php
							
							$con = mysql_connect( 'localhost', 'root', 'root' ) ;
							mysql_select_db( 'vrm', $con );
						
							$sql = "SELECT set_codigo, set_nome, set_descricao FROM setor ORDER BY set_nome";
							$res = mysql_query( $sql );
							while ( $row = mysql_fetch_assoc( $res ) ) {
								echo ("<option value='" .$row['set_codigo']."'>".$row['set_nome']." - " .$row['set_descricao']. "</option>");
							}
							
							mysql_close();
						?>
			
					</select>
				</div>
			</div>
		
			</p></p>
		
			<div class="form-group">
			 	<div class="input-group">
					<span class="input-group-addon">ÁREA:</span>
					<select class="form-control" id="area" name="area" disabled="disabled"  onclick="habilitaCamera()">
						
						<option value="-">SELECIONE UM SETOR</option>

						<script type="text/javascript">
						$(function(){
							$('#setor').change(function(){
								if( $(this).val() ) {
									$('#area').hide();
									
									$.getJSON('areas/area.ajax.php?search=',{setor: $(this).val(), ajax: 'true'}, function(j){
										var options = '<option value="-">TODAS ÁREAS DESTE SETOR</option>';	
										for (var i = 0; i < j.length; i++) {
											options += '<option value="' + j[i].area + '">' + j[i].nome + ' - ' + j[i].descricao + '</option>';
										}	
										$('#area').html(options).show();
									});
									
								} else {
									$('#area').html('<option value="-">TODAS ÁREAS DESTE SETOR</option>');
								}
							});
						});
						</script>
					
					</select>
				</div>
			</div>
		
			</p></p>

			<div class="form-group">
			 	<div class="input-group">
					<span class="input-group-addon">CAMERA:</span>
					<select class="form-control" id="camera" name="camera" disabled="disabled">
						<option value="-">TODAS</option>
						<script type="text/javascript">
						$(function(){
							$('#area').change(function(){
								if( $(this).val() ) {
									$('#camera').hide();

									$.getJSON('cameras/camera.ajax.php?search=',{area: $(this).val(), ajax: 'true'}, function(j){
										var options = '<option value="-">TODAS DESTA ÁREA</option>';	
										for (var i = 0; i < j.length; i++) {
											options += '<option value="' + j[i].camera + '">' + j[i].nome + ' - ' + j[i].descricao + '</option>';
										}	
										$('#camera').html(options).show();
									});
									
								} else {
									$('#camera').html('<option value="-">TODAS</option>');
								}
							});
						});
						</script>
					
					</select>
				</div>
			</div>
		
			</p></p>			
			
			<div class="form-group">
            	<button type="submit" class="btn btn-primary" onclick="realizaPesquisa()">
            		<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Pesquisar
            	</button>
            </div>	
			
		</form>
	</div>
</div>

<br><br><br>

<script type="text/javascript">

function realizaPesquisa() {
	document.getElementById("area").disabled = false;
	document.getElementById("camera").disabled = false;
}

function habilitaArea() {
	document.getElementById("area").disabled = false;
}

function habilitaCamera() {
	document.getElementById("camera").disabled = false;
}

$(document).ready(function() {
    $('.form-inline').formValidation({
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        err: {
            container: 'tooltip'
        },
		
        fields: {
            'inicio': {
                validators: {
	                notEmpty: {
	                    message: 'Informe o período inicial da pesquisa.'
	                },
                }
            },
	        'fim': {
	            validators: {
	                notEmpty: {
	                    message: 'Informe o período final da pesquisa.'
	                }, 
	            }
	        }
        }
	})

});

</script>
