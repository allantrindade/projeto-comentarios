<?php
session_start();
$id = isset($_POST['id']) ? $_POST['id'] : '';
$email = isset($_POST['email']) ? addslashes($_POST['email']) : '';
$usuario = isset($_POST['usuario']) ? addslashes($_POST['usuario']) : '';
$usuario1 = isset($_POST['usuario1']) ? addslashes($_POST['usuario1']) : '';
$senha =  isset($_POST['senha']) ? addslashes($_POST['senha']) : '';
$senha1 = isset($_POST['senha1']) ? addslashes($_POST['senha1']) : '';
$senha2 = isset($_POST['senha2']) ? addslashes($_POST['senha2']) : '';
$usuarioLogado = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'anônimo';
$emailLogado = isset($_SESSION['email']) ? $_SESSION['email'] : 'anônimo';
$data = strtotime(date('Y/m/d H:i:s'));
$comentario = isset($_POST['comentario']) ? strip_tags($_POST['comentario']) : '';
$foto = isset($_FILES['foto']) ? $_FILES['foto'] : '';
$acao = isset($_GET['id']) ? "Editar" : "Publicar";
$url = explode("/", isset($_GET['url']) ? $_GET['url'] : 'home');
$idGet = isset($_GET['id']) ? $_GET['id'] : "" ;
$userGet = isset($_GET['user']) ? $_GET['user'] : "" ;
$mensagemErro = '';
?>