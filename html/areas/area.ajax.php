<?php
	header( 'Cache-Control: no-cache' );
	header( 'Content-type: application/xml; charset="utf-8"', true );

	$con = mysql_connect( 'localhost', 'root', 'root' ) ;
	mysql_select_db( 'vrm', $con );

	$setor = mysql_real_escape_string( $_REQUEST['setor'] );

	$areas = array();

	$sql = "SELECT are_codigo, are_nome, are_descricao
			FROM area
			WHERE are_setor=$setor
			ORDER BY are_nome";
	
	$res = mysql_query( $sql );
	
	while ( $row = mysql_fetch_assoc( $res ) ) {
		$areas[] = array(
			'area'	=> $row['are_codigo'],
			'nome'	=> $row['are_nome'],
			'descricao' => $row['are_descricao'],
		);
	}

	echo( json_encode( $areas ) );
?>