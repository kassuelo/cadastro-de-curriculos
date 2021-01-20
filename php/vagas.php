<!DOCTYPE html>

<?php 
include("verifica_login.php");
include('conecta.php'); ?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
  <title>Vagas</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../css/estilo.css" rel="stylesheet">
</head>
<body>
 <?php
 include("banner.php");
 include("menu_h.php");
 include("menu_v.php");
 ?>
 <div class="corpo" >
  <table class="vagas">
    <tr>
      <th>Empresa</th>
      <th>Cargo</th>
      <th>Área Atuação</th>
      <th>Quantidade de Vagas</th>
      <th>Endereco</th>
      <th>Cidade</th>
      <th>Estado</th>
      <th>Telefone</th>
      <th>E-mail</th>
    </tr>

    <?php
    $area_usuario = $_SESSION['area_atuacao'];

    $sql_vaga = "SELECT e.nome_fantasia,v.ID_empresa, v.cargo,v.area_atuacao,v.qtd_vagas,v.endereco,v.cidade,v.estado,v.telefone,v.email FROM vagas AS v INNER JOIN empresa AS e ON v.ID_empresa=e.ID WHERE area_atuacao=?";
    if ($stmt = mysqli_prepare($id_conexao, $sql_vaga)) {
      /* bind parametros for markers */
      mysqli_stmt_bind_param($stmt, 's', $area_usuario);

      mysqli_stmt_execute($stmt);
      mysqli_stmt_bind_result($stmt,$nome_fantasia,$ID_empresa, $cargo,$area_atuacao,$qtd_vagas,$endereco,$cidade,$estado,$telefone,$email);
      mysqli_stmt_store_result($stmt);

      if(mysqli_stmt_num_rows($stmt)>0){
        while(mysqli_stmt_fetch($stmt)){
          ?> 
          <tr>
            <td> <?php echo $nome_fantasia ?></td>
            <td><?php echo $cargo ?></td>
            <td><?php echo $area_atuacao ?></td>
            <td><?php echo $qtd_vagas ?></td>
            <td><?php echo $endereco ?></td>
            <td><?php echo $cidade ?></td>
            <td><?php echo $estado ?></td>
            <td><?php echo $telefone ?></td>
            <td><?php echo $email ?></td>
          </tr>
          <?php
        }
        mysqli_stmt_close($stmt);
      }
    }
    ?>


    </table>
    </div>
    <?php
    include("publicidade.php");
    include("rodape.php");
    ?>
  </body>
  </html>
