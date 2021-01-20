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
	?>
	<div class="login">
		<br>
		<p><p>Você que está cansado de bater de porta em porta na busca por um emprego, aproveite essa oportunidade e cadastre seu currículo. Após cadastrar seu currículo, você terá maior visibilidade, de forma que você consiga ser encontrado por alguma empresa que busque um perfil como o seu. Terá acesso a lista de vagas disponíveis, em diversas localidades, nas mais variadas áreas.</p></p><br><br><br>
		<img src="../imagens/profissionais.jpg" width="100%">
	</div>
	<div class="login_form">
		<form method="POST" action="login.php" target="_self">
			<fieldset>
				<legend>Login</legend>
				Nome de usuário:<br>
				<input type="text" name="login"><br>
				Senha:<br>
				<input type="password" name="senha"><br><br>
				<input type="submit" value="Entrar">
				<a href="cadastra_usuario_form.php">Cadastrar-se</a>
			</fieldset>
		</form>
	</div>
	<?php
	include("rodape.php");
	?>
	
</body>
</html>
