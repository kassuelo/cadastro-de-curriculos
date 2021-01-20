<?php
include("menu_v.php");
unset ($_SESSION['ID_usuario']);
unset ($_SESSION['login']);
unset ($_SESSION['nivel_acesso']);
unset ($_SESSION['area_atuacao']);
echo "<script>alert('Você saiu');
document.getElementById('entra').style.display = 'block';
document.getElementById('nome_logado').style.display = 'none';
window.location.replace(\"index.php\");</script>";
?>