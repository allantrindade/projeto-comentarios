<?php
require '../autoload.php';
require '../Config/variaveis.php';
    
    if (isset($_POST['btnLogar'])){
        if ($usuario == '' || $senha == '') {
            $_SESSION['msgerro'] = 'Preencher todos os campos.';
            $_SESSION['icon'] = 'error';  
            header('Location: ../login');
        }
        elseif ($mensagemErro === '') {
            $u = new classUsuario();
            if($u->login($usuario, $senha) == TRUE) {
                header("Location: ../home");
            } else {
                $_SESSION['msgerro'] = 'Usuário ou Senha Incorretos!';
                $_SESSION['icon'] = 'error';
                header('Location: ../login');
            }
        }
    }    
?>