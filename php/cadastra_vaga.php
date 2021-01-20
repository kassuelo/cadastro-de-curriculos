<?php
include('conecta.php');

$nome_fantasia = $_POST['empresa'];
$cargo = $_POST['cargo'];
$area_atuacao = $_POST['area'];
$qtd_vagas = $_POST['qtd_vagas'];


if(empty($nome_fantasia)||empty($cargo)||empty($area_atuacao)||empty($qtd_vagas)){
	echo "<SCRIPT type='text/javascript'>
	alert('Todos os campos com * são obrigatórios!');
	window.location.replace(\"cadastra_vaga_form.php\");
	</SCRIPT>";
	exit;
}else{
	$sql_empresa = "SELECT ID,endereco,cidade,estado,telefone,email FROM empresa WHERE nome_fantasia=?";
	if ($stmt = mysqli_prepare($id_conexao, $sql_empresa)) {
		/* bind parametros for markers */
		mysqli_stmt_bind_param($stmt, 's', $nome_fantasia);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt,$ID,$endereco,$cidade,$estado,$telefone,$email);
		mysqli_stmt_store_result($stmt);
		if(mysqli_stmt_num_rows($stmt)>0){
			while(mysqli_stmt_fetch($stmt)){
			}
			mysqli_stmt_close($stmt);

			$sql_vaga = "INSERT INTO vagas (ID_empresa,cargo,area_atuacao,qtd_vagas,endereco,cidade,estado,telefone,email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
			if ($stmt = mysqli_prepare($id_conexao, $sql_vaga)) {

				/* bind parametros for markers */
				mysqli_stmt_bind_param($stmt, 'ississsss', $ID, $cargo, $area_atuacao,$qtd_vagas, $endereco, $cidade, $estado, $telefone, $email);
				/* executa query */

				if(mysqli_stmt_execute($stmt)){
					echo "<SCRIPT type='text/javascript'> //not showing me this
					alert('$qtd_vagas vagas da $nome_fantasia cadastradas!');
					window.location.replace(\"cadastra_vaga_form.php\");
					</SCRIPT>";
				}
				else{
		// mostra o erro do banco
					echo "<SCRIPT type='text/javascript'> 
					alert('mysqli_error($id_conexao)');
					</SCRIPT>"; 
				}
				mysqli_stmt_close($stmt);
			}
		}else{
			echo "<SCRIPT type='text/javascript'> //not showing me this
			alert('Empresa da vaga não localizada!');
			window.location.replace(\"cadastra_vaga_form.php\");
			</SCRIPT>";
		}
	}
}


?>
