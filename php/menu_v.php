

<div class="menu_v" >
	
	<ul>
		
		<a href="login_form.php" id="entra"><li >Entra</li></a>
		<a href="sair.php" id="sair"><li style="display: none" id="nome_logado"></li></a>
		<a href="cadastra_usuario_form.php" id="temp" ><li id="cadastra_usuario">Registre-se</li></a>
		<a href="cadastra_empresa_form.php" id="empresa" style="display: none"><li>Cadastra Empresa</li></a>
		<a href="cadastra_vaga_form.php" id="vaga" style="display: none"><li>Cadastra Vaga</li></a>
		<?php 

		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$usuario_logado = isset($_SESSION['login'])?$_SESSION['login']:null;
		if(!empty($usuario_logado)){
			echo "<script>document.getElementById('entra').style.display = 'none';</script>";
			echo "<script>document.getElementById('nome_logado').style.display = 'block';</script>";
			echo "<script>document.getElementById('nome_logado').innerHTML = '($usuario_logado) Sair';</script>";

			if(isset($_SESSION["nivel_acesso"])){
				if($_SESSION["nivel_acesso"]=='Administrador'){
					echo "<script>document.getElementById('cadastra_usuario').innerHTML = 'Cadastrar'</script>";
					echo "<script>document.getElementById('empresa').style.display = 'block';</script>";
					echo "<script>document.getElementById('vaga').style.display = 'block';</script>";
					echo "<script>document.getElementById('vaga').style.display = 'block';</script>";
				}else{
					echo "<script>document.getElementById('temp').style.display = 'none';</script>";
					echo "<script>document.getElementById('vaga').style.display = 'none';</script>";
					echo "<script>document.getElementById('empresa').style.display = 'none';</script>";

				}
			}else{
				echo "<script>document.getElementById('cadastra_usuario').innerHTML = 'Registrar-se'</script>";
			}
		}else{
			echo "<script>document.getElementById('sair').style.display = 'none';</script>";
		}
		?>
		Links externos
		<a href="https://www.educamaisbrasil.com.br/cursos"><li>Cursos</li></a>
		<a href="https://www.superestagios.com.br/index/"><li>Estágios</li></a>
		<a href="https://marketagem.com.br/workshops-gratuitos/"><li>Workshop</li></a>
		<a href="https://www.valor.com.br/carreira/6041565/cinco-tendencias-para-o-mercado-de-trabalho-em-2019"><li>Tendências</li></a>

		
		
	</ul>
</div>
