<br>

<ul class="nav nav-tabs">
	<li role="presentation" class="active">
  		<a href="principal.php?pg=sobre" target="mainFrame">Sobre o Sistema</a>
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

	<legend>Sobre o Sistema </legend>
	<p align="justify">O sistema VRM de gravação de video é composto por um conjunto de tecnologias livres, sem custo de licenças de software. A conexão com as cameras é realizada através do <a href="https://pt.wikipedia.org/wiki/RTSP" target="_blank">Protocolo RTSP</a> que é implementado pelos VIP-X 1600 da Bosch e demais DVR's existentes no mercado, como por exemplo, os dos parlatórios que utilizam aparelhos da empresa Intelbras.</p>
	<br>
	Os seguintes programas compõe o VRM: <br><br>
	
	<table style="border-collapse: separate; border-spacing: 10px;">
		<tr>
			<td valign="top"><a href="http://www.videolan.org/vlc/" target="_blank"><img src="../logos/vlc.png" width="50" height="50"></a></td>
			<td valign="center"><a href="http://www.videolan.org/vlc/" target="_blank">VLC - Video Lan Comunity</a> <br>
			Utilizado para função capturar e salvar em disco os stream de video capturado através do <a href="https://pt.wikipedia.org/wiki/RTSP" target="_blank">Protocolo RTSP</a>.</td>
		</tr>
		<tr>
			<td valign="top"><a href="http://www.openmediavault.org/" target="_blank"><img src="../logos/openmediavault.png" width="50" height="50"></a></td>
			<td valign="center"><a href="http://www.openmediavault.org/" target="_blank"> OpenMediaVault</a><br> 
			Free Network Storage, função de gerenciar o <a href="https://pt.wikipedia.org/wiki/RAID" target="_blank">RAID 0 (Stripping)</a> dos HD's Satas, e compartilhamento de arquivos entre as estações do CMC.</td>
		</tr>
		<tr>
			<td valign="top"><a href="http://php.net/" target="_blank"><img src="../logos/php.png" width="50" height="50"></a></td>
			<td valign="center"><a href="http://php.net/" target="_blank">PHP - Linguagem de Programação</a><br> 
			Utilizada no front-end para cadastro de cameras e pesquisa de arquivos de video. </td>
		</tr>
		<tr>
			<td valign="top"><a href="https://www.mysql.com/" target="_blank"><img src="../logos/mysql.png" width="50" height="50"></a></td>
			<td valign="center"><a href="https://www.mysql.com/" target="_blank">MYSQL - Banco de Dados</a> 
			<br>Utilizado para armanezar as informações passadas através do Front-End em PHP.</td>
		</tr>
		<tr>
			<td valign="top"><a href="https://www.nginx.com/" target="_blank"><img src="../logos/nginx.png" width="50" height="50"></a></td>
			<td valign="center"><a href="https://www.nginx.com/" target="_blank">NGINX - Web Server</a> 
			<br>Web Server utilizado pelo OpenMediaVault e pelo front-end em PHP do VRM.<br></td>
		</tr>		
		<tr>
			<td valign="top"><a href="https://www.debian.org/index.pt.html" target="_blank"><img src="../logos/debian.png" width="50" height="50"></a></td>
			<td valign="center"><a href="https://www.debian.org/index.pt.html" target="_blank">DEBIAN - Sistema Operacional Linux</a> 
			<br>Sistema Operacional Linux base do OpenMediavault</td>
		</tr>	
	</table>
	<br>
	<legend>Como funciona </legend>
	<p align="justify"><strong>1° Passo - O Ambiente</strong> - Primeiramente é necessário preparar o ambiente, ou seja, efetuar o cadastro dos setores, áreas e das cameras. Somente as cameras com o campo de gravação marcado irão gravar arquivos de video.
	Essas informações serão armazenadas no banco de dados <a href="https://www.mysql.com/" target="_blank">Mysql</a>. </p>
	
	<p align="justify"><strong>2° Passo - VLC</strong> - O <a href="http://www.videolan.org/vlc/" target="_blank">VLC</a> a captura de stream de audio/video através de linha de comando dada pela seguinte sintaxe: <br><i>
	vlc -I dummy URL_RSTP_CAMERA --sout '#transcode{}:duplicate{dst=std{access=file,mux=mp4,dst={ARQUIVO_DE_DESTINO}}}' --run-time=' DURACAO_DO_VIDEO ' --stop-time=' DURACAO_DO_VIDEO ' vlc://quit ";
	</i></p>
	<p align="justify"><strong>3° Passo - Script de Gravação</strong> - O Script de gravação em <a href="http://php.net/" target="_blank">PHP</a> busca no banco de dados todas as cameras com o campo de gravação habilitado e outras informações 
	como setores e áreas. Com essas informações, ele executa o <u>2° passo</u>, substituindo as variáveis - URL_RTSP_CAMERA, ARQUIVO_DE_DESTINO, DURACAO_DO_VIDEO - pelos dados recuperados no Mysql.
	</p>
	<p>
	Os arquivos gerados estão disponíveis através do compartilhamento de rede gerenciado pelo <a href="http://www.openmediavault.org/" target="_blank">OpenMediaVault</a> 
	ou então através desta interface Web gerenciado pelo <a href="https://www.nginx.com/" target="_blank">Nginx</a> para consulta de Videos.
	</p>
	
	<p align="justify"><strong>4° Passo - Agendamento de Tarefas</strong> - Para que o script de gravação possa ser executado de tempos em tempos, gerando os arquivos sequencialmente conforme à DURACAO_DO_VIDEO foi estabelecida, é necessário colocá-lo 
	na agenda de tarefas do sistema operacional. Nos Sistemas Linux/Unix esse agendador de tarefas denomina-se <u>crontab</u>.</p>
			
	</div>
</div>
