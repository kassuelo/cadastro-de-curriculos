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
	<div class="corpo">
		<fieldset>
			<legend>Cadastro de empresa</legend>
			<form method="POST" action="cadastra_empresa.php" target="_self">

				<div class="nome_campo">
					*Razão Social 
				</div>
				<div class="campos">
					<input type="text" name="razao_social" id="razao_social" style="width:100%;">
				</div>
				<div class="nome_campo">
					*Nome Fantasia 
				</div>
				<div class="campos">
					<input type="text" name="nome_fantasia" id="nome_fantasia" style="width:100%;">
				</div>
				<div class="nome_campo">
					*Endereço 
				</div>
				<div class="campos">
					<input type="text" name="endereco" id="endereco" style="width:100%;">
				</div>
				<div class="nome_campo">
					*Cidade 
				</div>
				<div class="campos">
					<input type="text" name="cidade" id="cidade" style="width:100%;">
				</div>
				<div class="nome_campo">
					*Estado 
				</div>
				<div class="campos">
					<input type="text" name="estado" id="estado" style="width:100%;">
				</div>
				<div class="nome_campo">
					*Telefone 
				</div>
				<div class="campos">
					<input type="text" name="telefone" id="telefone" style="width:100%;">
				</div>
				<div class="nome_campo">
					*E-mail 
				</div>
				<div class="campos">
					<input type="text" name="email" id="email" style="width:100%;">
				</div>
				<div class="nome_campo">
					*CNPJ 
				</div>
				<div class="campos">
					<input type="text" name="cnpj" id="cnpj" style="width:100%;">
				</div>
				<div class="nome_campo">
					*Inscrição Estadual 
				</div>
				<div class="campos">
					<input type="text" name="inscricao_estadual" id="inscricao_estadual" style="width:100%;">
				</div>
				<div class="nome_campo">
					*Inscrição Municipal 
				</div>
				<div class="campos">
					<input type="text" name="inscricao_municipal" id="inscricao_municipal" style="width:100%;">
				</div>

				<div class="campos">
					<input type="submit" value="Cadastrar Empresa">
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
