<?php
session_start();
$id = isset($_POST['id']) ? $_POST['id'] : '';
$idHidden = isset($_SESSION['id']) ? $_SESSION['id'] : "" ;
$email = isset($_POST['email']) ? addslashes($_POST['email']) : '';
$usuario = isset($_POST['usuario']) ? addslashes($_POST['usuario']) : '';
$usuario1 = isset($_POST['usuario1']) ? addslashes($_POST['usuario1']) : '';
$senha =  isset($_POST['senha']) ? addslashes($_POST['senha']) : '';
$senha1 = isset($_POST['senha1']) ? addslashes($_POST['senha1']) : '';
$senha2 = isset($_POST['senha2']) ? addslashes($_POST['senha2']) : '';
$usuarioLogado = isset($_SESSION['loggedin']) ? $_SESSION['loggedin'] : 'anônimo';
$emailLogado = isset($_SESSION['email']) ? $_SESSION['email'] : 'anônimo';
$data = strtotime(date('Y/m/d H:i:s'));
$comentario = isset($_POST['comentario']) ? strip_tags($_POST['comentario']) : '';
$foto = isset($_FILES['foto']) ? $_FILES['foto'] : '';
$mensagemErro = '';

if (isset($_POST['acao'])) { 
    $acao = $_POST['acao']; 
} elseif(isset($_GET['id'])) {
    $_SESSION['id'] = $_GET['id'];
}else {
    $acao = "";
}

?>