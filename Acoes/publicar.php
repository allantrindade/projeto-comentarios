<?php

use Classes\classCrud;

require_once '../vendor/autoload.php';
require_once '../Includes/variaveis.php';

//Evento do botão "Publicar" Pagina Home (Ação:Publicar)
if (isset($_POST['btnPublicar']) && $_POST['acao'] == 'Publicar') {
    if ($usuarioLogado == '' || $comentario == '') {
        $_SESSION['msgerro'] = 'Preencher o comentário';
        $_SESSION['icon'] = 'error';
        header('Location: ../home');
    } 
    elseif ($mensagemErro === ""){
        $crud = new classCrud;
        $crud->insertDB('comentarios', '?,?,?,?', array(isset($_POST['anonimo']) ? 'anônimo' : $usuarioLogado,
        isset($_POST['anonimo']) ? 'anônimo' : $emailLogado, $data, $comentario), 'usuario, email, data_criacao, comentario');
        $_SESSION['msgerro'] = 'Comentário Inserido';
        $_SESSION['icon'] = 'success';
        header('Location: ../home');
    }
}
//Evento do botão "Publicar" Pagina Home (Ação:Editar)
if (isset($_POST['btnPublicar']) && $_POST['acao'] == 'Editar') {
    if ($usuarioLogado == '' || $comentario == '') {
        $_SESSION['msgerro'] = 'Preencher o comentário';
        $_SESSION['icon'] = 'error';
        header('Location: ../home');
    } 
    elseif ($mensagemErro === ""){
        $crud = new classCrud;
        $crud->updateDB('comentarios', 'usuario = ?, email = ?, data_edicao = ?, comentario = ?',
        $_POST['idGet'], array(isset($_POST['anonimo']) ? 'anônimo' : $usuarioLogado, isset($_POST['anonimo']) ? 'anônimo' : $emailLogado, $data, $comentario)); 
        $_SESSION['msgerro'] = 'Comentário Editado';
        $_SESSION['icon'] = 'success';
        header('Location: ../home');
    }
}