<?php 
// Inicia sessões 
session_start(); 
 
// Verifica se existe os dados da sessão de login 
if(!isset($_SESSION["ID_usuario"]) || !isset($_SESSION["login"])) 
{ 
// Usuário não logado! Redireciona para a página de login 
	echo "<SCRIPT type='text/javascript'> //not showing me this
	alert('Acesso negado!');
	window.location.replace(\"login_form.php\");
	</SCRIPT>";
	exit; 
exit; 
} 
?>