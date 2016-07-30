<?php 

session_start();

$logado = $_SESSION["login"];

if($logado == "") {
	header('location: login.php');
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>VRM - GESTÃO DE CAMERAS DE VIDEO</title>

</head>
<frameset rows="60,*" cols="*" frameborder="no" border="0" framespacing="0">
  <frame src="cabecalho.php" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame">
  <frameset rows="*" cols="230,*" framespacing="0" frameborder="no" border="0">
    <frame src="menu.php" name="leftFrame" scrolling="No" noresize="noresize" id="leftFrame" title="leftFrame">
    <frame src="principal.php" name="mainFrame" id="mainFrame" title="mainFrame">
  </frameset>
</frameset>
<noframes><body>
</body></noframes>
</html>
