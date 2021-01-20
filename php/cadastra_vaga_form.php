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

<?php
include("banner.php");
include("menu_h.php");
include("menu_v.php");
include("conecta.php");
$sql = "SELECT `nome_fantasia` FROM `empresa`";
$resultado = mysqli_query($id_conexao, $sql);
?>

<body>
	<div class="corpo">
		<fieldset>
			<legend>Cadastro de vagas</legend>
			<form method="POST" action="cadastra_vaga.php" target="_self">
				
				<div class="nome_campo">
					*Empresa
				</div>
				<div class="campos">
					<select name="empresa" id="empresa">
						<?php while($reg = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) { ?>
							<option value="<?php echo $reg['nome_fantasia']; ?>">
								<?php echo $reg['nome_fantasia']; ?>
							</option>
						<?php } ?>
					</select>
				</div>

				<div class="nome_campo">
					*Cargo
				</div>
				<div class="campos">
					<input type="text" name="cargo" id="cargo" style="width:100%;">
				</div>

				<div class="nome_campo">
					*Área de atuação
				</div>
				<div class="campos">
					<select name="area" id="area">
						<option value="Administração">Administração</option>
						<option value="Agronomia">Agronomia</option>
						<option value="Arquitetura e Urbanismo">Arquitetura e Urbanismo</option>
						<option value="Biomedicina">Biomedicina</option>
						<option value="Ciência da Computação">Ciência da Computação</option>
						<option value="Ciências Biológicas">Ciências Biológicas</option>
						<option value="Ciências Contábeis">Ciências Contábeis</option>
						<option value="Publicidade e Propaganda">Publicidade e Propaganda</option>
						<option value="Design">Design</option>
						<option value="Educação Física">Educação Física</option>
						<option value="Enfermagem">Enfermagem</option>
						<option value="Engenharia Civil">Engenharia Civil</option>
						<option value="Engenharia de Produção">Engenharia de Produção</option>
						<option value="Engenharia de Software">Engenharia de Software</option>
						<option value="Engenharia Elétrica">Engenharia Elétrica</option>
						<option value="Engenharia Mecânica">Engenharia Mecânica</option>
						<option value="Engenharia Química">Engenharia Química</option>
						<option value="Estética e Cosmética">Estética e Cosmética</option>
						<option value="Farmácia">Farmácia</option>
						<option value="Fisioterapia">Fisioterapia</option>
						<option value="Gestão de Cooperativas">Gestão de Cooperativas</option>
						<option value="História">História</option>
						<option value="Jornalismo">Jornalismo</option>
						<option value="Letras">Letras</option>
						<option value="Logística">Logística</option>
						<option value="Matemática">Matemática</option>
						<option value="Medicina">Medicina</option>
						<option value="Medicina Veterinária">Medicina Veterinária</option>
						<option value="Nutrição">Nutrição</option>
						<option value="Pedagogia">Pedagogia</option>
						<option value="Processos Gerenciais">Processos Gerenciais</option>
						<option value="Psicologia">Psicologia</option>

					</select>
				</div>
				<div class="nome_campo">
					*Quantidade de vagas
				</div>
				<div class="campos">
					<input type="text" name="qtd_vagas" id="qtd_vagas" style="width:100%;">
				</div>
				
				<div class="campos">
					<input type="submit" value="Cadastrar vaga">
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
