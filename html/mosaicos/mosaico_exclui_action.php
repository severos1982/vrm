<?php
	
	$mos = $_GET['mos'];
	
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$bd = "vrm";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password);
	
	mysql_connect("$servername", "$username", "$password") or die(mysql_error());
	mysql_select_db($bd) or die(mysql_error());
	
	$result = mysql_query("delete from grid_view where grv_grid=" .$mos);
	
	if(!$result) {
		echo (mysql_error());
	}
	
	$result = mysql_query("delete from grid where gri_codigo=" .$mos); 
	
	if(!$result) {
		echo (mysql_error());
	
	}else {
		header('location: ../principal.php?pg=mosaicos');
	}
	
	
?>