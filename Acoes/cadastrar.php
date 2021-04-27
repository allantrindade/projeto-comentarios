<?php

use Models\Classes\classCrud;
use Models\Classes\classImagem;
use Models\Classes\classPassword;

require_once '../vendor/autoload.php';
require_once '../Config/variaveis.php';

if (isset($_POST['btnCadastrar'])) {  
    //Verifica se já tem algum usuário ou email cadastrados iguais
    $crud = new classCrud;
    $query = $crud->selectDB('*', 'usuarios', "WHERE usuario ='{$usuario1}' OR email ='{$email}'", array());
    $fetch = $query->fetch(PDO::FETCH_OBJ);
    if ($usuario1 == '' || $senha1 == '' || $email == '') {
        $_SESSION['msgerro'] = 'Preencher todos os campos.';
        $_SESSION['icon'] = 'error';
        header('Location: ../cadastro');
    }
    elseif ($foto['name'] == '') {
        $_SESSION['msgerro'] = 'Adicionar sua foto.';
        $_SESSION['icon'] = 'error';
        header('Location: ../cadastro');
    }
    elseif (strpos($email, '@') === false) {
        $_SESSION['msgerro'] = 'Email inválido';
        $_SESSION['icon'] = 'error';
        header('Location: ../cadastro');
    }
    elseif (strlen($senha1) < 6) {
        $_SESSION['msgerro'] = 'Senha deve conter no mínimo 6 caracteres';
        $_SESSION['icon'] = 'error';
        header('Location: ../cadastro');
    }
    elseif (!empty($fetch)) {
        $_SESSION['msgerro'] = 'Usuário ou Email já Cadastrado.';
        $_SESSION['icon'] = 'error';
        header('Location: ../cadastro');
    }
    elseif ($mensagemErro === '') {
        $crud = new classCrud;
        $hash = new classPassword;
        $imagem = new classImagem;
        $imagem->gravarFoto($foto);
        $crud->insertDB('usuarios', '?,?,?,?,?', array($usuario1, $email, $data_cadastro, $hash->passwordHash($senha1), $imagem->gerarNome($foto)), 'usuario, email, data_cadastro, senha, imagem');
        $_SESSION['msgerro'] = 'Usuário Cadastrado com Sucesso.';
        $_SESSION['icon'] = 'success';
        header('Location: ../login');
    }
}