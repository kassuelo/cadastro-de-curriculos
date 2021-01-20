<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
	<title>Há Vagas!</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link  rel="stylesheet" type="text/css" href="../css/estilo.css">
</head>
<body>
	<?php
	include("banner.php");
	include("menu_h.php");
	include("menu_v.php");
	?>
	<!--formata o campo Data de Nascimento-->
	<script language="JavaScript" type="text/javascript">
		function dateMask(inputData, e){

	if(document.all) // Internet Explorer

		var tecla = event.keyCode;

	else //Outros Browsers

		var tecla = e.which;



	if(tecla >= 47 && tecla < 58){ // numeros de 0 a 9 e "/"

		var data = inputData.value;


//validar o dia do mês
if (data.length == 2){

	if(inputData.value >= 1 && inputData.value <= 31) {

		data += '/';

		inputData.value = data;

	}

	else

		return false;

}
//validar o mês (de 1 a 12)

if (data.length == 5){

	mes = data[3]+""+data[4];

	if(mes >= 1 && mes <= 12) {

		data += '/';

		inputData.value = data;

	}

	else

		return false;

}



	}else if(tecla == 8 || tecla == 0) // Backspace, Delete e setas direcionais(para mover o cursor, apenas para FF)

	return true;

	else

		return false;

}
</script>
<div class="corpo">
	<fieldset>
		<legend>Cadastro de usuário</legend>
		<form method="POST" action="cadastra_usuario.php" target="_self">

			<div class="nome_campo">
				*Nome 
			</div>
			<div class="campos">
				<input type="text" name="nome" required style="width:100%;">
			</div>
			<div class="nome_campo">
				*Sobrenome 
			</div>
			<div class="campos">
				<input type="text" name="sobrenome" style="width:100%;">
			</div>
			<div class="nome_campo">
				*Sexo 
			</div>
			<div class="campos">
				<input type="radio" name="sexo" value="Masculinho"> Masculino
				<input type="radio" name="sexo" value="Feminino">Feminino
			</div>
			<div class="nome_campo">
				*Data de Nascimento 
			</div>
			<div class="campos">
				<input type="text" name="data_nasc" maxlength="10" onkeypress="return dateMask(this, event);" >
			</div>
			<div class="nome_campo">
				*Login 
			</div>
			<div class="campos">
				<input type="text" name="login" style="width:100%;">
			</div>
			<div class="nome_campo">
				*Senha 
			</div>
			<div class="campos">
				<input type="password" name="senha" style="width:100%;">
			</div>
			<?php 
			if (session_status() == PHP_SESSION_NONE) {
				session_start();
			}
			if(isset($_SESSION["nivel_acesso"])){
				if($_SESSION["nivel_acesso"]=='Administrador'){
					echo"
					<div class='nome_campo'>
					*Nível de acesso 
					</div>
					<div class='campos'>
					<select name='nivel_acesso'>
					<option value='Administrador'>Administrador</option>
					<option value='Cliente'>Cliente</option>
					</select>
					</div>
					";
				}
			}else{
				echo"
				<div class='nome_campo'>
				*Nível de acesso 
				</div>
				<div class='campos'>
				<select name='nivel_acesso'>
				<option value='Cliente' selected>Cliente</option>
				</select>
				</div>
				";
			}	
			?>
			<div class="nome_campo">
				*CPF 
			</div>
			<div class="campos">
				<input type="text" name="cpf" style="width:100%;">
			</div>
			<div class="nome_campo">
				Telefone 
			</div>
			<div class="campos">
				<input type="text" name="telefone" style="width:100%;">
			</div>
			<div class="nome_campo">
				E-mail 
			</div>
			<div class="campos">
				<input type="text" name="email" style="width:100%;">
			</div>
			<div class="campos">
				<input type="submit" value="Cadastrar Usuário">
			</div>
		</form>
	</fieldset>
</div>
<?php
include("publicidade.php");
include("rodape.php");
?>
</body>
</html>
