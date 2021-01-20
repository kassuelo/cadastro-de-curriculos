<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>Currículo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/estilo.css" rel="stylesheet">
</head>

<?php
include("conecta.php");
include("banner.php");
include("menu_h.php");
include("menu_v.php");


if(isset($_SESSION['ID_usuario'])){
    $usuario = $_SESSION['ID_usuario'];

    $sql_id_pessoa = "SELECT ID from pessoa where ID_usuario= ?";
    if ($stmt = mysqli_prepare($id_conexao, $sql_id_pessoa)) {

        /* bind parametros for markers */
        mysqli_stmt_bind_param($stmt, 'i', $usuario);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt,$ID);

        mysqli_stmt_store_result($stmt);
        mysqli_stmt_fetch($stmt);
        $ID;
        mysqli_stmt_close($stmt);
    }
    $sql = "SELECT nome,sobrenome,idade,email,CPF,experiencias,escolaridade,area_atuacao,idiomas,CNH,foto FROM curriculo WHERE ID_pessoa = $ID";
    $result = mysqli_query($id_conexao, $sql);
    if(mysqli_num_rows($result) > 0){
        $funcao = "exibeCurriculo()";

        while($row = mysqli_fetch_array($result)){
            $nome = $row['nome'];
            $sobrenome = $row['sobrenome'];
            $idade = $row['idade'];
            $email = $row['email'];
            $CPF = $row['CPF'];
            $experiencias = $row['experiencias'];
            $escolaridade = $row['escolaridade'];
            $area_atuacao = $row['area_atuacao'];
            $_SESSION['area_atuacao'] = $area_atuacao;
            $idiomas = $row['idiomas'];
            $CNH = $row['CNH'];
            $foto = $row['foto'];
        }
        
    }else{

        $funcao = null;
    }
}

?>
<body  onload="<?php echo $funcao; ?>">

    <script>
        function exibeCurriculo() {
            document.getElementById("nome").value ="<?php echo $nome; ?>";
            document.getElementById('sobrenome').value = "<?php echo $sobrenome; ?>";
            document.getElementById('idade').value = "<?php echo $idade; ?>";
            document.getElementById('email').value = "<?php echo $email; ?>";
            document.getElementById('cpf').value = "<?php echo $CPF; ?>";
            document.getElementById('experiencias').value = "<?php echo $experiencias; ?>";
            document.getElementById('escolaridade').value = "<?php echo $escolaridade; ?>";
            document.getElementById('area').value = "<?php echo $area_atuacao; ?>";
            document.getElementById('idioma').value = "<?php echo $idiomas; ?>";
            document.getElementById('cnh').value = "<?php echo $CNH; ?>";
            document.getElementById('imagem').value = "<?php echo $foto; ?>";
            document.getElementById('cadastrar').style.display = 'none';
            document.getElementById('editar').style.display = 'block';
            document.getElementById('excluir').style.display = 'block';
        }

        function actionCadastrar() {
            document.getElementById('form').action = "cadastra_curriculo.php";
        }
        function actionEditar() {
            document.getElementById('form').action = "atualiza_curriculo.php";
        }

        function actionExcluir() {
            document.getElementById('form').action = "exclui_curriculo.php";
        }

    </script>

    <div class="corpo">
        
        <form method="POST" id="form">
            <h3>Currículo</h3>

            <div class="nome_campo" >
                *Nome 
            </div>
            <div class="campos">
                <input type="text"  name="nome" id="nome" style="width:100%;">
            </div>
            <div class="nome_campo">
                *Sobrenome 
            </div>
            <div class="campos">
                <input type="text" name="sobrenome" id="sobrenome" style="width:100%;">
            </div>
            <div class="nome_campo">
                *Idade 
            </div>
            <div class="campos">
                <input type="text" name="idade" id="idade" style="width:100%;">
            </div>
            <div class="nome_campo">
                E-mail 
            </div>
            <div class="campos">
                <input type="text" name="email" id="email" style="width:100%;">
            </div>
            <div class="nome_campo">
                CPF  
            </div>
            <div class="campos">
                <input type="text" name="cpf" id="cpf" style="width:100%;">
            </div>
            <div class="nome_campo" style="margin-bottom: 40px">
                Experiências 
            </div>
            <div class="campos" style="margin-bottom: 40px">
                <textarea style="resize:none;" rows="4" cols="67" name="experiencias" id="experiencias"></textarea>
            </div>
            <div class="nome_campo">
                *Escolaridade 
            </div>
            <div class="campos">
                <input type="text" name="escolaridade"  id="escolaridade" style="width:100%;">
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
                *Idiomas 
            </div>
            <div class="campos">
                <input type="text" name="idioma" id="idioma" style="width:100%;">
            </div>

            <div class="nome_campo">
                *CNH 
            </div>
            <div class="campos">
                <select name="cnh" id="cnh">
                    <option>Não possui</option>
                    <option>Categoria A</option>
                    <option>Categoria A/B</option>
                    <option>Categoria A/C</option>
                    <option>Categoria A/D</option>
                    <option>Categoria A/E</option>
                    <option>Categoria B</option>
                    <option>Categoria C/</option>
                    <option>Categoria D</option>
                    <option>Categoria E</option>
                </select>
            </div>
            <div class="nome_campo" >Foto de perfil</div>
            <div class="campos"> <input  name="imagem" id="imagem" type="file"/></div>
            <div class="campos">
                <input type="submit" id="cadastrar" onMouseOver="actionCadastrar()" value="Cadastrar Currículo">
                <div class="botao_curriculo">
                    <input type="submit" id="editar" style="display: none" onMouseOver="actionEditar()" value="Editar Currículo">
                </div>
                <div class="botao_curriculo">
                    <input type="submit" id="excluir" onMouseOver="actionExcluir()" style="display: none;" value="Excluir Currículo">
                </div>
            </div>

        </form>
    </div>
    <?php
    include("publicidade.php");
    include("rodape.php");


    ?>
</body>
</html>
