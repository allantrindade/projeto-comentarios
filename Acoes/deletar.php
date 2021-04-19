<?php
include('../Classes/classCrud.php');

$crud = new classCrud();

$idHidden = isset($_GET['id']) ? $_GET['id'] : "";
$userHidden = isset($_GET['user']) ? $_GET['user'] : "";

session_start();
$usuarioLogado = $_SESSION['loggedin'];
$mensagemErro = '';


if (($idHidden == '')) {
    $mensagemErro = "<script>alert('Preencher o campo id para excluir')</script>";
    echo $mensagemErro;
}
elseif ($usuarioLogado != $userHidden && $userHidden != 'anônimo') {
    $mensagemErro = "<script>alert('Você pode excluir somente o seu comentário');window.location.href='../Pages/index.php'</script>";
    echo $mensagemErro;
}
elseif ($mensagemErro === '') {
    $crud->deleteDB('comentarios', '?', array($idHidden));
    echo("<script>alert('Comentário Excluido');window.location.href='../Pages/index.php'</script>");
}