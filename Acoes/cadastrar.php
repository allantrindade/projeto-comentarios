<?php
include('../Includes/variaveis.php');
include('../Classes/classCrud.php');
include('../Classes/classUsuario.php');
include('../Classes/classPassword.php');
include('../Classes/classImagem.php');

$crud = new classCrud();
$hash = new classPassword();
$imagem = new classImagem();

if (isset($_POST['btnCadastrar'])) {  
    //Verifica se já tem algum usuário ou email cadastrados iguais
    $query = $crud->selectDB('*', 'usuarios', "WHERE usuario ='{$usuario1}' OR email ='{$email}'", array());
    $fetch = $query->fetch(PDO::FETCH_OBJ);
    if ($usuario1 == '' || $senha1 == '' || $senha2 == '') {
        $mensagemErro = "<script>alert('Preencher todos os campos.')</script>";
        echo $mensagemErro;
    }
    elseif ($foto['name'] == '') {
        $mensagemErro = "<script>alert('Adicionar sua foto.')</script>";
        echo $mensagemErro;
    }
    elseif (strpos($email, '@') === false) {
        $mensagemErro = "<script>alert('Email Inválido.')</script>";
        echo $mensagemErro;
    }
    elseif (strlen($senha1) < 6) {
        $mensagemErro = "<script>alert('Senha deve conter no mínimo 6 caracteres')</script>";
        echo $mensagemErro;
    }
    elseif ($senha1 != $senha2) {
        $mensagemErro = "<script>alert('Senhas não Conferem.')</script>";
        echo $mensagemErro;
    }
    elseif (!empty($fetch)) {
        $mensagemErro = "<script>alert('Usuário ou Email já Cadastrado.')</script>";
        echo $mensagemErro;
    }
    elseif ($mensagemErro === '') {
        $imagem->gravarFoto($foto);
        $crud->insertDB('usuarios', '?,?,?,?', array($email, $usuario1, $hash->passwordHash($senha2), $imagem->gerarNome($foto)), 'email, usuario, senha, imagem');
        echo("<script>alert('Usuário Cadastrado');window.location.href='login.php'</script>");
    }
}