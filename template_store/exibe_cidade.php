<?php

	include_once '../DataBase/conexao.php';

	session_start();
	$Uf = isset($_GET['search']) ? $_GET['search'] : 0;

	$conn = new Conexao();
	$conn = $conn->conexao();

	$stmt = $conn->prepare('SELECT * FROM municipio WHERE estado_Uf = "'.$Uf.'" ORDER BY Nome');
	
	$stmt->execute();
	$resultado_cidades = $stmt->fetchAll();
	
	foreach( $resultado_cidades as $row_cidade ) { 
		echo '<option value="'.$row_cidade['Id'].'">'.$row_cidade['Nome'].'</option>';
	}
?>