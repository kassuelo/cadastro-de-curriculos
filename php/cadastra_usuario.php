<?php
include('conecta.php');

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$sexo = $_POST['sexo'];
$data_nasc = $_POST['data_nasc'];
// Recupera o login 
$login = $_POST["login"];
// Recupera a senha, a criptografando em MD5 
$senha = md5($_POST["senha"]); 
$nivel_acesso = $_POST['nivel_acesso'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];

if(empty($nome)||empty($sobrenome)||empty($sexo)||empty($data_nasc)||empty($login)||empty($senha)||empty($nivel_acesso)||empty($cpf)){
	echo "<SCRIPT type='text/javascript'>
	alert('Todos os campos com * são obrigatórios!');
	window.location.replace(\"cadastra_usuario_form.php\");
	</SCRIPT>";
	exit;
}else{
	$sql = "SELECT `usuario`.`login`, `pessoa`.`CPF` FROM `usuario`,`pessoa` where `usuario`.`login`= ? || `pessoa`.`CPF`= ?";
	if ($stmt = mysqli_prepare($id_conexao, $sql)) {
		/* bind parametros for markers */
		mysqli_stmt_bind_param($stmt, 'ss', $login, $cpf);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt,$login, $cpf);
		mysqli_stmt_store_result($stmt);
		if(mysqli_stmt_num_rows($stmt)>0){
			echo "<SCRIPT type='text/javascript'> //not showing me this
			alert('Usuário já cadastrado!');
			window.location.replace(\"cadastra_usuario_form.php\");
			</SCRIPT>";
			mysqli_stmt_close($stmt);
		}else{
			$sql_usuario = "INSERT INTO usuario (login,senha,nivel_acesso) VALUES (?, ?, ?)";
			$sql_ID_usuario = "SELECT ID from usuario where login = ?";
			$sql_pessoa = "INSERT INTO pessoa (ID_usuario,nome,sobrenome,sexo,data_nasc,cpf,telefone,email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

			if ($stmt = mysqli_prepare($id_conexao, $sql_usuario)) {

				/* bind parametros for markers */
				mysqli_stmt_bind_param($stmt, 'sss', $login, $senha, $nivel_acesso);

				/* executa query */
				if(mysqli_stmt_execute($stmt)){
					echo "<SCRIPT type='text/javascript'> 
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
			if ($stmt = mysqli_prepare($id_conexao, $sql_ID_usuario)) {
				/* bind parametros for markers */
				mysqli_stmt_bind_param($stmt, 's', $login);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $ID);
				mysqli_stmt_store_result($stmt);
				if(mysqli_stmt_num_rows($stmt)==1){
					while (mysqli_stmt_fetch($stmt)) {
						$ID_usuario = $ID;
					}

					echo "<SCRIPT type='text/javascript'> 
					</SCRIPT>";
				}
				else{
		// mostra o erro do banco
					echo "<SCRIPT type='text/javascript'> 
					alert('erro!');
					</SCRIPT>"; 
				}
				mysqli_stmt_close($stmt);
			}
			if ($stmt = mysqli_prepare($id_conexao, $sql_pessoa)) {

				/* bind parametros for markers */
				mysqli_stmt_bind_param($stmt, 'ssssssss',$ID_usuario,$nome,$sobrenome,$sexo,$data_nasc,$cpf,$telefone,$email);

				/* executa query */
				if(mysqli_stmt_execute($stmt)){
					echo "<SCRIPT type='text/javascript'> 
					alert('Usuário $nome $sobrenome cadastrado!');
					window.location.replace(\"cadastra_usuario_form.php\");
					</SCRIPT>";
				}
				else{
		// mostra o erro do banco
					echo "<SCRIPT type='text/javascript'> 
					alert('erro ao conectar no banco!');
					</SCRIPT>"; 
				}
				mysqli_stmt_close($stmt);
			}
		}
	}
}


		?>
