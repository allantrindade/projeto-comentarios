<?php
    include('./Classes/classUsuario.php');
    include('./Includes/variaveis.php');
    include('./Classes/classPassword.php');
    
    if (isset($_POST['btnLogar'])){
        if ($usuario == '' || $senha == '') {
            $mensagemErro = "<script>alert('Preencher todos os campos.')</script>";
            echo $mensagemErro;
        }
        elseif ($mensagemErro === '') {
            $u = new classUsuario();
            if($u->login($usuario, $senha) == TRUE) {
                header("Location: home");
            } else {
                echo "<script>alert('Usuário ou Senha incorretos!')</script>";
            }
        }
    }    
?>