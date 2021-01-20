<?php
	$dbname="trab2_bd";
	$host="localhost";
	$usuario="root";
	$senha="";

	error_reporting(E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
	
	if(!($id_conexao = mysqli_connect($host,$usuario,$senha)))
	{
		echo "Não foi possível estabelecer uma conexão com o gerenciador MySQL.";
		exit;
	}

	if(!($conexao = mysqli_select_db($id_conexao, $dbname)))
	{
		echo "Não foi possível conectar ao banco de dados.";
		exit;
	}
	
	mysqli_query($id_conexao, "SET NAMES 'utf8'");
?>
