<?php

$mosaico = $_GET['mos'];

$servername = "localhost";
$username = "root";
$password = "root";
$bd = "vrm";

// Create connection
$conn = new mysqli($servername, $username, $password);

mysql_connect("$servername", "$username", "$password") or die(mysql_error());
mysql_select_db($bd) or die(mysql_error());

$sql = mysql_query("SELECT * FROM grid where gri_codigo=".$mosaico);
$grid = mysql_fetch_row($sql);

$sql = mysql_query("select cam_url from grid_view, camera where grv_grid=" .$grid[0]. " and grv_camera=cam_codigo");

$cameras = array();
$count = 0;

while($row = mysql_fetch_assoc($sql)){
	
	$cameras[$count] = $row['cam_url'];
	$count++;
}

echo(mysql_error());

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo($grid[1]); ?></title>
</head>
<body leftmargin="0" topmargin="0" bgcolor="#000000">
<table style="padding: 0;">
	<tr>
		<td align="right">
			<OBJECT classid="clsid:9BE31822-FDAD-461B-AD51-BE1D1C159921"
		     	codebase="http://downloads.videolan.org/pub/videolan/vlc/latest/win32/axvlc.cab"
		    	width="638" height="480" id="vlc" events="True">
		   		<param name="Src" value="<?php echo($cameras[0]);?>" />
		   		<param name="ShowDisplay" value="True" />
		   		<param name="AutoLoop" value="False" />
		  		<param name="AutoPlay" value="True" />
		   		<embed id="vlcEmb"  type="application/x-google-vlc-plugin" version="VideoLAN.VLCPlugin.2" autoplay="yes" loop="no" width="640" height="480"
		    	target="<?php echo($cameras[0]);?>" ></embed>
			</OBJECT>
		</td>
		<td align="left">
			<OBJECT classid="clsid:9BE31822-FDAD-461B-AD51-BE1D1C159921"
		     	codebase="http://downloads.videolan.org/pub/videolan/vlc/latest/win32/axvlc.cab"
		    	width="638" height="480" id="vlc" events="True">
		   		<param name="Src" value="<?php echo($cameras[1]);?>" />
		   		<param name="ShowDisplay" value="True" />
		   		<param name="AutoLoop" value="False" />
		  		<param name="AutoPlay" value="True" />
		   		<embed id="vlcEmb"  type="application/x-google-vlc-plugin" version="VideoLAN.VLCPlugin.2" autoplay="yes" loop="no" width="640" height="480"
		    	target="<?php echo($cameras[1]);?>" ></embed>
			</OBJECT>		
		</td>
	</tr>
	<tr>
		<td align="right">
			<OBJECT classid="clsid:9BE31822-FDAD-461B-AD51-BE1D1C159921"
		     	codebase="http://downloads.videolan.org/pub/videolan/vlc/latest/win32/axvlc.cab"
		    	width="638" height="480" id="vlc" events="True">
		   		<param name="Src" value="<?php echo($cameras[2]);?>" />
		   		<param name="ShowDisplay" value="True" />
		   		<param name="AutoLoop" value="False" />
		  		<param name="AutoPlay" value="True" />
		   		<embed id="vlcEmb"  type="application/x-google-vlc-plugin" version="VideoLAN.VLCPlugin.2" autoplay="yes" loop="no" width="640" height="480"
		    	target="<?php echo($cameras[2]);?>" ></embed>
			</OBJECT>		
		</td>
		<td align="left">
			<OBJECT classid="clsid:9BE31822-FDAD-461B-AD51-BE1D1C159921"
		     	codebase="http://downloads.videolan.org/pub/videolan/vlc/latest/win32/axvlc.cab"
		    	width="638" height="480" id="vlc" events="True">
		   		<param name="Src" value="<?php echo($cameras[3]);?>" />
		   		<param name="ShowDisplay" value="True" />
		   		<param name="AutoLoop" value="False" />
		  		<param name="AutoPlay" value="True" />
		   		<embed id="vlcEmb"  type="application/x-google-vlc-plugin" version="VideoLAN.VLCPlugin.2" autoplay="yes" loop="no" width="640" height="480"
		    	target="<?php echo($cameras[3]);?>" ></embed>
			</OBJECT>		
		</td>
	</tr>

</table>

<script type="text/javascript">

//TELA CHEIA - TECLA ENTER
document.addEventListener("keydown", function(e) {
	  if (e.keyCode == 13) {
	    toggleFullScreen();
	  }
	}, false);

function toggleFullScreen() {
	  if (!document.fullscreenElement &&    // alternative standard method
	      !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement ) {  // current working methods
	    if (document.documentElement.requestFullscreen) {
	      document.documentElement.requestFullscreen();
	    } else if (document.documentElement.msRequestFullscreen) {
	      document.documentElement.msRequestFullscreen();
	    } else if (document.documentElement.mozRequestFullScreen) {
	      document.documentElement.mozRequestFullScreen();
	    } else if (document.documentElement.webkitRequestFullscreen) {
	      document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
	    }
	  } else {
	    if (document.exitFullscreen) {
	      document.exitFullscreen();
	    } else if (document.msExitFullscreen) {
	      document.msExitFullscreen();
	    } else if (document.mozCancelFullScreen) {
	      document.mozCancelFullScreen();
	    } else if (document.webkitExitFullscreen) {
	      document.webkitExitFullscreen();
	    }
	  }
	}

</script>

</body>
</html>
