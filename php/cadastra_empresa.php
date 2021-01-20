<?php
include('conecta.php');

$razao_social = $_POST['razao_social'];
$nome_fantasia = $_POST['nome_fantasia'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
// Recupera o login 
$estado = $_POST['estado'];
// Recupera a senha, a criptografando em MD5 
$telefone = $_POST['telefone']; 
$email = $_POST['email'];
$cnpj = $_POST['cnpj'];
$inscricao_estadual = $_POST['inscricao_estadual'];
$inscricao_municipal = $_POST['inscricao_municipal'];

if(empty($razao_social)||empty($nome_fantasia)||empty($endereco)||empty($cidade)||empty($estado)||empty($telefone)||empty($email)||empty($cnpj)||empty($inscricao_estadual)||empty($inscricao_municipal)){
	echo "<SCRIPT type='text/javascript'>
	alert('Todos os campos com * são obrigatórios!');
	window.location.replace(\"cadastra_empresa_form.php\");
	</SCRIPT>";
	exit;
}else{
	$sql = "SELECT razao_social FROM empresa WHERE razao_social=?";
	if ($stmt = mysqli_prepare($id_conexao, $sql)) {
		/* bind parametros for markers */
		mysqli_stmt_bind_param($stmt, 's', $razao_social);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt,$razao_social);
		mysqli_stmt_store_result($stmt);
		if(mysqli_stmt_num_rows($stmt)>0){
			echo "<SCRIPT type='text/javascript'> //not showing me this
			alert('Empresa já cadastrada!');
			window.location.replace(\"cadastra_empresa_form.php\");
			</SCRIPT>";
			mysqli_stmt_close($stmt);
		}else{
			$sql_empresa = "INSERT INTO empresa (razao_social,nome_fantasia,endereco,cidade,estado,telefone,email,cnpj,inscricao_estadual,inscricao_municipal) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			if ($stmt = mysqli_prepare($id_conexao, $sql_empresa)) {

				/* bind parametros for markers */
				mysqli_stmt_bind_param($stmt, 'ssssssssss', $razao_social,$nome_fantasia,$endereco,$cidade,$estado,$telefone,$email,$cnpj,$inscricao_estadual,$inscricao_municipal);
				/* executa query */
				if(mysqli_stmt_execute($stmt)){
					echo "<SCRIPT type='text/javascript'> //not showing me this
					alert('Empresa $nome_fantasia cadastrada!');
					window.location.replace(\"cadastra_empresa_form.php\");
					</SCRIPT>";
				}
				else{
		// mostra o erro do banco
					echo "<SCRIPT type='text/javascript'> 
					alert(mysqli_error($id_conexao));
					</SCRIPT>"; 
				}
				mysqli_stmt_close($stmt);
			}
		}
	}
}


?>
