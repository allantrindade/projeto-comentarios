<?php

include('../Includes/variaveis.php');
include('../Classes/classCrud.php');
$crud = new classCrud();

//Evento botão Publicar Comentários em Publicações
if (isset($_POST['btnPublicar']) && $acao == 'Publicar') {
    if ($usuarioLogado == '' || $comentario == '') {
        $mensagemErro = "<script>alert('Preencher o comentário')</script>";
        echo $mensagemErro;
    } 
    elseif ($mensagemErro === ""){
        $crud->insertDB('comentarios', '?,?,?,?', array(isset($_POST['anonimo']) ? 'anônimo' : $usuarioLogado,
        isset($_POST['anonimo']) ? 'anônimo' : $emailLogado, $data, $comentario), 'usuario, email, data_criacao, comentario');
        echo("<script>alert('Comentário Inserido')</script>");
    }
}
//Evento botão Publicar Comentários em Edições
if (isset($_POST['btnPublicar']) && $acao == 'Editar') {
    if ($usuarioLogado == '' || $comentario == '') {
        $mensagemErro = "<script>alert('Preencher o comentário')</script>";
        echo $mensagemErro;
    } 
    elseif ($mensagemErro === ""){
        $crud->updateDB('comentarios', 'usuario = ?, email = ?, data_edicao = ?, comentario = ?',
        $idHidden, array(isset($_POST['anonimo']) ? 'anônimo' : $usuarioLogado, isset($_POST['anonimo']) ? 'anônimo' : $emailLogado, $data, $comentario));     
        echo("<script>alert('Comentário Editado')</script>");
    }
}