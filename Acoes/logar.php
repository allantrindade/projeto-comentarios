<?php
    include('../Includes/variaveis.php');
    include('../Classes/classUsuario.php');
    include('../Classes/classPassword.php');
    
    if (isset($_POST['btnLogar'])){
        if ($usuario == '' || $senha == '') {
            $mensagemErro = "<script>alert('Preencher todos os campos.');window.location.href='../login'</script>";
            echo $mensagemErro;
        }
        elseif ($mensagemErro === '') {
            $u = new classUsuario();
            if($u->login($usuario, $senha) == TRUE) {
                header("Location: ../home");
            } else {
                echo "<script>alert('Usuário ou Senha Incorretos!');window.location.href='../login'</script>";
            }
        }
    }    
?>