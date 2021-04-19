<?php
    include('../Classes/classUsuario.php');
    include('../Includes/variaveis.php');
    include('../Classes/classPassword.php');
    $u = new classUsuario();

    if (isset($_POST['btnLogar'])){
        if ($usuario == '' || $senha == '') {
            $mensagemErro = "<script>alert('Preencher todos os campos.')</script>";
            echo $mensagemErro;
        }
        elseif ($mensagemErro === '') {
            if($u->login($usuario, $senha)) {
                header("Location: index.php");
            } else {
                echo "<script>alert('Usuário ou Senha incorretos!')</script>";
            }
        }
    }    
?>