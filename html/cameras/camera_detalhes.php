<?php 

$camera = $_GET['camera'];

$servername = "localhost";
$username = "root";
$password = "root";
$bd = "vrm";

// Create connection
$conn = new mysqli($servername, $username, $password);

mysql_connect("$servername", "$username", "$password") or die(mysql_error());
mysql_select_db($bd) or die(mysql_error());

$result = mysql_query("SELECT cam_codigo, cam_nome, cam_descricao, cam_url, cam_area, are_nome, are_descricao, set_nome, cam_observacao, cam_gravando, cam_dome FROM camera, area, setor where cam_codigo=" .$camera." and cam_area=are_codigo and set_codigo=are_setor");
$row = mysql_fetch_row($result);

mysql_close(); 

?>

<br>
<ul class="nav nav-tabs">
  <li role="presentation">
  	<a href="principal.php?pg=camera" target="mainFrame">Cameras</a>
  	</li>
  <li role="presentation" class="active">
  	<a href="#" target="mainFrame">Detalhes da Câmera</a>
  </li>
</ul>
<br>

<div class="panel-group" id="accordion" style="width: 98%">
  <div class="panel panel-default">
    <div class="panel-heading">
       <h4 class="panel-title">
       		<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
       		<span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span>
       		Ao Vivo - <?php echo(" " .$row[1]. " - " .$row[2]); ?></a>
    	</h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body" align="center">
			<OBJECT classid="clsid:9BE31822-FDAD-461B-AD51-BE1D1C159921"
		     			codebase="http://downloads.videolan.org/pub/videolan/vlc/latest/win32/axvlc.cab"
		    			width="640" height="480" id="vlc" events="True">
		   				<param name="Src" value="<?php echo($row[3]);?>" />
		   				<param name="ShowDisplay" value="True" />
		   				<param name="AutoLoop" value="False" />
		  				<param name="AutoPlay" value="True" />
		   				<embed id="vlcEmb"  type="application/x-google-vlc-plugin" version="VideoLAN.VLCPlugin.2" autoplay="yes" loop="no" width="640" height="480"
		    			target="<?php echo($row[3]);?>" ></embed>
			</OBJECT>
      </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
       	<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
        Arquivos de video da camera <?php echo(" " .$row[1]. " - " .$row[2]); ?>
        </a>
      </h4>
    </div>
    <div id="collapse3" class="panel-collapse collapse">
    	
    			
    				  	<!-- Table -->
		  	<table class="table table-striped">
		    
		    	<tr>
		    		<td><strong><u>Arquivo</u></strong></td>
		    		<td><strong><u>Data / Hora</u></strong></td>
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
    			 
    			 	$result = mysql_query("select arq_arquivo, arq_time, cam_nome, set_nome, are_nome 
    			 						 	from arquivos_camera, camera, setor, area 
    			 							where arq_camera=".$camera. " and arq_camera=cam_codigo and cam_area=are_codigo and are_setor=set_codigo");
			    	    
				    while($row_arq = mysql_fetch_assoc($result)) {
				    
				    	$dia  = substr($row_arq['arq_time'], 8, 2);
				    	$mes  = substr($row_arq['arq_time'], 5, 2);
				    	$ano  = substr($row_arq['arq_time'], 0, 4);
				    	
				    	if ($mes == 01) {
				    		$mes = "01_JANEIRO";
				    	
				    	}else if($mes == 02) {
				    		$mes = "02_FEVEREIRO";
				    	
				    	}else if($mes == 03) {
				    		$mes = "03_MARCO";
				    	
				    	}else if($mes == 04) {
				    		$mes = "04_ABRIL";
				    	
				    	}else if($mes == 05) {
				    		$mes = "05_MAIO";
				    	
				    	}else if($mes == 06) {
				    		$mes = "06_JUNHO";
				    	
				    	}else if($mes == 07) {
				    		$mes = "07_JULHO";
				    	
				    	}else if($mes == 08) {
				    		$mes = "08_AGOSTO";
				    	
				    	}else if($mes == 09) {
				    		$mes = "09_SETEMBRO";
				    	
				    	}else if($mes == 10) {
				    		$mes = "10_OUTUBRO";
				    	
				    	}else if($mes == 11) {
				    		$mes = "11_NOVEMBRO";
				    	
				    	}else {
				    		$mes = "12_DEZEMBRO";
				    	}
				    	
				    	$url_path = "/" .$ano. "/" .$mes. "/" .$dia. "/" .$row_arq['set_nome']. "/" .$row_arq['are_nome']. "/" .$row_arq['cam_nome']. "/";
				    	$url_path = str_replace(" ", "_", $url_path);
				    					    	
				    	echo("<tr>");
				    	echo("<td><a href='/videos" .$url_path . $row_arq['arq_arquivo']. "' target='_blank'><span class='glyphicon glyphicon-film' aria-hidden='true'></span> " .$row_arq['arq_arquivo']. "</a></td>");
				    	echo("<td>" .$row_arq['arq_time']. "</td>"); 
				    	echo("</tr>");
				    }
				    
				    echo(mysql_error());
				    mysql_close();
				    ?>
    			
    		</table>
    	
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        <span class="glyphicon glyphicon glyphicon-wrench" aria-hidden="true"></span>
        Atualizar / Modificar Dados da Camera
        </a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">
      		<form role="form" class="valida_form" id="camera_form" name="camera_form" method="post">
				
				<legend><?php echo($row[1]); ?></legend>
	
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon">Nome da Camera: </span>
						<input class="form-control" id="nome" value="<?php echo($row[1]); ?>" name="nome" placeholder="Informe o nome da Camera">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon">Descrição: </span>
						<input class="form-control" id="descricao" value="<?php echo($row[2]); ?>" name="descricao" placeholder="Informe uma descrição para Camera">
					</div>
				</div>
	
				<div class="form-group">
				 	<div class="input-group">
						<span class="input-group-addon">Localizada na Área:</span>
						<select class="form-control" id="area" name="area">
						    <option value="<?php echo($row[4]); ?>"><?php echo($row[7]. " - " .$row[5]. " - " .$row[6]); ?></option>
							
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
	     
	    					while($row_areas = mysql_fetch_assoc($result)){
	        					//echo "ID: ".$row['id'].", Nome:".$row['nome'].", Cidade:".$row['cidade'].", Idade:".$row['idade']."<br/>";
	    						echo ("<option value='" .$row_areas['are_codigo']. "'>" .$row_areas['set_nome']. " - " .$row_areas['are_nome']. " - " .$row_areas['are_descricao']. "</option>");
	    					}
							
							
							?>
							
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon">URL: </span>
						<input class="form-control" id="url" name="url"  value="<?php echo($row[3]); ?>" placeholder="Informe a URL da Camera">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon">Observação: </span>
						<input class="form-control" id="observacao" value="<?php echo($row[8]); ?>" name="observacao" placeholder="Em caso de necessidade">
					</div>
				</div>	
	
				<div class="checkbox">
						<?php 
						
						if($row[9] == 1) {
							echo ("<label><input type='checkbox' id='gravando' name='gravando' checked='checked'>Gravar está camera</label>");
						
						}else {
							echo("<label><input type='checkbox' id='gravando' name='gravando'>Gravar está camera</label>");
							
						}
						
						?>
				</div>	
	
				<div class="checkbox">
						
						<?php 
						
						if($row[10] == 1) { 
							echo("<label><input type='checkbox' id='dome' name='dome' checked='checked' >É camera do tipo dome</label>");
							
						}else {
							echo("<label><input type='checkbox' id='dome' name='dome' >É camera do tipo dome</label>");
						}
						
						?>
						
				</div>
						
	            <div class="form-group">
	            	<button type="submit" class="btn btn-success" onclick="atualiza()">
	            		<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Atualizar
	            	</button> 
	            	<button type="submit" class="btn btn-danger" onclick="exclui()">
	            		<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Excluir
	            	</button>
	            </div>
	            
	            <input type="hidden" value="<?php echo ($row[0]); ?>" id="codigo" name="codigo">								
			</form>	
      </div>
    </div>
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

function atualiza() { 
	document.camera_form.action = "cameras/camera_atualiza_action.php";
	document.valida_form.submit();
}

function exclui() { 
	document.camera_form.action = "cameras/camera_exclui_action.php";
	document.valida_form.submit();
}

</script>
