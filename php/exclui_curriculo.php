<?php
include('conecta.php');
include('verifica_login.php');

if(isset($_SESSION['ID_usuario'])){
	$usuario = $_SESSION['ID_usuario'];

	$sql_id_pessoa = "SELECT ID from pessoa where ID_usuario= ?";
	if ($stmt = mysqli_prepare($id_conexao, $sql_id_pessoa)) {

		/* bind parametros for markers */
		mysqli_stmt_bind_param($stmt, 'i', $usuario);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt,$ID);

		mysqli_stmt_store_result($stmt);
		mysqli_stmt_fetch($stmt);
		$ID;
		mysqli_stmt_close($stmt);
	}

	$sql = "DELETE FROM curriculo WHERE ID_pessoa=?";

	if ($stmt = mysqli_prepare($id_conexao, $sql)) {

		/* bind parametros for markers */
		mysqli_stmt_bind_param($stmt, 'i', $ID);


		/* executa query */
		if(mysqli_stmt_execute($stmt)){
			echo "<SCRIPT type='text/javascript'> //not showing me this
			alert('Currículo excluido com sucesso!');
			window.location.replace(\"curriculo.php\");
			</SCRIPT>";
		}
		else{
			echo "<SCRIPT type='text/javascript'> //not showing me this
			alert('Ocorreu um erro na operação!');
			window.location.replace(\"curriculo.php\");
			</SCRIPT>";
		// mostra o erro do banco
			echo mysqli_error($id_conexao);
		}

		/* close statement */
		mysqli_stmt_close($stmt);
	}
	else {
		echo "<SCRIPT type='text/javascript'> //not showing me this
		alert('Ocorreu um erro na operação!');
		window.location.replace(\"curriculo.php\");
		</SCRIPT>";
		echo mysqli_error($id_conexao);
	}
}

?>