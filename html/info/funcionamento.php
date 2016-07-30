<br>

<ul class="nav nav-tabs">
	<li role="presentation">
  		<a href="principal.php?pg=sobre" target="mainFrame">Sobre o Sistema</a>
	</li>
	<li role="presentation" class="active">
		<a href="principal.php?pg=funcionamento" target="mainFrame">Como Funciona</a>
	</li>
	<li role="presentation" >
		<a href="principal.php?pg=info" target="mainFrame">Estatísticas</a>
	</li>
	<li role="presentation">
		<a href="principal.php?pg=versao" target="mainFrame">Notas de Versão</a>
	</li>
</ul>

<br>

<div class="panel panel-default" style="width: 98%">
	<div class="panel-body">

	<legend>Como funciona </legend>
	<p align="justify"><strong>1° Passo - O Ambiente</strong> - Primeiramente é necessário preparar o ambiente, ou seja, efetuar o cadastro dos setores e áreas de cada setor e das cameras, informando a URL para conexão RTSP. Somente as cameras com o campo de gravação marcado irão gravar arquivos de video.
	Essas informações serão armazenadas no banco de dados Mysql. </p>
	
	<p align="justify"><strong>2° Passo - VLC</strong> - O VLC a captura de stream de audio/video através de linha de comando dada pela seguinte sintaxe: <br><i>
	vlc -I dummy URL_RSTP_CAMERA --sout '#transcode{}:duplicate{dst=std{access=file,mux=mp4,dst={ARQUIVO_DE_DESTINO}}}' --run-time=' DURACAO_DO_VIDEO ' --stop-time=' DURACAO_DO_VIDEO ' vlc://quit ";
	</i></p>
	<p align="justify"><strong>3° Passo - Script de Gravação</strong> - O Script de gravação busca no banco de dados todas as cameras com o campo de gravação habilitado e outras informações 
	como setores e áreas. Com essas informações, ele executa o <u>2° passo</u>, substituindo as variáveis - URL_RTSP_CAMERA, ARQUIVO_DE_DESTINO, DURACAO_DO_VIDEO - pelos dados recuperados no Mysql.
	Essas informações são importantes principalmente para nomenclatura e localização do arquivo de video, adotando o seguinte padrão: <u>ANO/MES/DIA/SETOR/AREA/CAMERA/arquivo-data-hora.mp4</u>
	</p>
	<p align="justify"><strong>4° Passo - Agendamento de Tarefas</strong> - Para que o script de gravação possa ser executado de tempos em tempos, gerando os arquivos sequencialmente conforme a DURACAO_DO_VIDEO foi estabelecida, é necessário, colocá-lo 
	na agenda de tarefas do sistema operacional. Nos Sistemas Linux/Unix esse agendador de tarefas denomina-se <u>crontab</u></p>
		
	</div>
</div>
