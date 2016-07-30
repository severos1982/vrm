<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

	$con = mysql_connect( 'localhost', 'root', 'root' ) ;
	mysql_select_db( 'vrm', $con );

	$area = mysql_real_escape_string( $_REQUEST['area'] );

	$cameras = array();

	$sql = "SELECT cam_codigo, cam_nome, cam_descricao
			FROM camera
			WHERE cam_area=$area
			ORDER BY cam_nome";
	
	$res = mysql_query( $sql );
	
	while ( $row = mysql_fetch_assoc( $res ) ) {
		$cameras[] = array(
			'camera'	=> $row['cam_codigo'],
			'nome'		=> $row['cam_nome'],
			'descricao'	=> $row['cam_descricao'],
		);
	}

	echo( json_encode( $cameras ) );
?>