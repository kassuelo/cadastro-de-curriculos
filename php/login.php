<?php
include("conecta.php");
// session_start inicia a sessão
if (!isset($_SESSION)) {//Verificar se a sessão não já está aberta.
	session_start();
}
// Recupera o login 
$login = addslashes(trim($_POST["login"]));
// Recupera a senha, a criptografando em MD5 
$senha = md5(trim($_POST["senha"])); 

// Usuário não forneceu a senha ou o login 
if(empty($login) || empty($senha)) 
{ 
	echo "<script>alert('Digite as informações!');
    window.location.replace('login_form.php');

    </script>";

}else{ 


    $sql = "SELECT * FROM usuario WHERE login=? AND senha=? LIMIT 1";

    if ($stmt = mysqli_prepare($id_conexao, $sql)) {

     /* bind parametros for markers */
     mysqli_stmt_bind_param($stmt, 'ss', $login, $senha);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_bind_result($stmt,$ID, $login,$senha,$nivel_acesso);

     mysqli_stmt_store_result($stmt);
     if(mysqli_stmt_num_rows($stmt)==1){

        while (mysqli_stmt_fetch($stmt)) {
            $_SESSION['ID_usuario'] = $ID;
            $_SESSION['login'] = $login;
            $_SESSION['nivel_acesso'] = $nivel_acesso;

            echo "<script>alert('Bem-vindo $nivel_acesso $login');
            window.location.replace(\"index.php\");
            </script>";
            
        }
    }else{
     unset ($_SESSION['ID_usuario']);
     unset ($_SESSION['login']);
     unset ($_SESSION['nivel_acesso'] );
     echo "<SCRIPT type='text/javascript'> //not showing me this
     alert('Usuário não encontrado!');
     window.location.replace(\"login_form.php\");
     </SCRIPT>";
 }
}else{
    unset ($_SESSION['ID_usuario']);
    unset ($_SESSION['login']);
    unset ($_SESSION['nivel_acesso'] );
    echo "<SCRIPT type='text/javascript'> //not showing me this
    alert('Usuário não encontrado!');
    window.location.replace(\"login_form.php\");
    </SCRIPT>";


}

/* close statement */
mysqli_stmt_close($stmt);
}

?>