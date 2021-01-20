<!DOCTYPE html>
<?php include("verifica_login.php"); ?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>Candidatos</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/estilo.css" rel="stylesheet">
</head>
<body>
 <?php
 include("banner.php");
 include("menu_h.php");
 include("menu_v.php");
 include('conecta.php');
 ?>
 <div class="corpo">
    <h3>Candidatos</h3>
    <?php
    $area_usuario = $_SESSION['area_atuacao'];
    $sql = "SELECT nome,sobrenome,area_atuacao,idade FROM curriculo WHERE area_atuacao=?";
    if ($stmt = mysqli_prepare($id_conexao, $sql)) {
      /* bind parametros for markers */
      mysqli_stmt_bind_param($stmt, 's', $area_usuario);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_bind_result($stmt,$nome,$sobrenome,$area_atuacao,$idade);
      mysqli_stmt_store_result($stmt);
      if(mysqli_stmt_num_rows($stmt)>0){
        while(mysqli_stmt_fetch($stmt)){
            ?>
            <div class="candidatos_img">
                <img src="../imagens/perfil_m.png">
            </div>
            <div class="candidatos_dados">
                Nome:<?php echo " $nome $sobrenome";?></br> 
                Área: <?php echo " $area_atuacao";?></br>
                Idade: <?php echo " $idade";?></br></br>
            </div>
 <?php 
        }
      }
    }
?>


</div>
<?php
include("publicidade.php");
include("rodape.php");
?>
</body>
</html>
