<?php
include('conecta.php');
include('verifica_login.php');
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$idade = $_POST['idade'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$experiencias = $_POST['experiencias'];
$escolaridade = $_POST['escolaridade'];
$area = $_POST['area'];
$idioma	= $_POST['idioma'];
$cnh = $_POST['cnh'];

if(empty($nome)||empty($sobrenome)||empty($idade)||empty($escolaridade)||empty($area)||empty($idioma)||empty($cnh)){
	echo "<SCRIPT type='text/javascript'> //not showing me this
	alert('Todos os campos com * são obrigatórios!');
	window.location.replace(\"curriculo.php\");
	</SCRIPT>";
	exit;
}else{

	$usuario = $_SESSION['ID_usuario'];
	$sql_id_pessoa = "SELECT ID from pessoa where ID_usuario= ?";
	if ($stmt = mysqli_prepare($id_conexao, $sql_id_pessoa)) {

		/* bind parametros for markers */
		mysqli_stmt_bind_param($stmt, 's', $usuario);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt,$ID);

		mysqli_stmt_store_result($stmt);
		if(mysqli_stmt_num_rows($stmt)==1){

			while (mysqli_stmt_fetch($stmt)) {
				$ID_pessoa = $ID;
			}
		}
		mysqli_stmt_close($stmt);
	}
	$sql = "UPDATE curriculo SET nome = ?, sobrenome = ?, idade = ?, email = ?, CPF = ?, experiencias = ?, escolaridade = ?, area_atuacao = ?, idiomas = ?, cnh = ? WHERE ID_pessoa = ?";


	if ($stmt = mysqli_prepare($id_conexao, $sql)) {

		/* bind parametros for markers */
		mysqli_stmt_bind_param($stmt, 'ssisssssssi', $nome, $sobrenome, $idade, $email, $cpf, $experiencias, $escolaridade, $area, $idioma, $cnh, $ID_pessoa);

		/* executa query */
		if(mysqli_stmt_execute($stmt)){
			echo "<SCRIPT type='text/javascript'> //not showing me this
			alert('Currículo atualizado com sucesso!');
			window.location.replace(\"curriculo.php\");
			</SCRIPT>";
		}
		else{
			echo "Ocorreu um erro na operação<br/>";
		// mostra o erro do banco
			echo mysqli_error($id_conexao);
		}


		/* close statement */
		mysqli_stmt_close($stmt);
	}


}

?>
