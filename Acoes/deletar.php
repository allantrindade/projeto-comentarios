<?php

include('../Classes/classCrud.php');
include('../Includes/variaveis.php');


if (($id == '')) {
     $mensagemErro = "<script>alert('Preencher o campo id para excluir')</script>";
     echo $mensagemErro;
}
elseif ($usuarioLogado != $userGet && $userGet != 'anônimo') {
    $mensagemErro = "<script>alert('Você pode excluir somente o seu comentário');window.location.href='../home'</script>";
    echo $mensagemErro;
}
elseif ($mensagemErro === '') {
    $crud = new classCrud();
    $crud->deleteDB('comentarios', '?', array($id));
    echo("<script>alert('Comentário Excluido');window.location.href='../home'</script>");
}