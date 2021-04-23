<?php
//Inicializa a sessão do Usuário
session_start();

// //Conexão do Banco de Dados AWS
// CONST SERVER = "mysqldb.c9jvbdikymy4.us-east-1.rds.amazonaws.com";
// CONST PORT = "3306";
// CONST USER = "admin";
// CONST PASSWORD = "75782366";
// CONST DATABASE = "bdcomentarios";

//Conexão do Banco de Dados LOCAL
CONST SERVER = "localhost";
CONST PORT = "3306";
CONST USER = "root";
CONST PASSWORD = "";
CONST DATABASE = "bdcomentarios"; 

//Inputs Page Cadastro
$usuario1 = isset($_POST['usuario1']) ? addslashes($_POST['usuario1']) : '';
$email = isset($_POST['email']) ? addslashes($_POST['email']) : '';
$data_cadastro = strtotime(date('Y/m/d'));
$senha1 = isset($_POST['senha1']) ? addslashes($_POST['senha1']) : '';
$senha2 = isset($_POST['senha2']) ? addslashes($_POST['senha2']) : '';
$foto = isset($_FILES['foto']) ? $_FILES['foto'] : '';

//Inputs Page Login
$usuario = isset($_POST['usuario']) ? addslashes($_POST['usuario']) : '';
$senha =  isset($_POST['senha']) ? addslashes($_POST['senha']) : '';

//Inputs Page Home 
$comentario = isset($_POST['comentario']) ? strip_tags($_POST['comentario']) : '';
$data = strtotime(date('Y/m/d H:i:s'));

//Variaveis do Index
$usuarioLogado = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : 'anônimo';
$emailLogado = isset($_SESSION['email']) ? $_SESSION['email'] : 'anônimo';
$url = explode("/", isset($_GET['url']) ? $_GET['url'] : 'home');
$acao = isset($url[1]) ? "Editar" : "Publicar";

//Variaveis do GET
$idGet = isset($url[1]) ? end($url): "" ;
$id = isset($_GET['id']) ? $_GET['id'] : "" ;
$userGet = isset($_GET['user']) ? $_GET['user'] : "" ;

//Validações de Erros
$mensagemErro = '';

//URL Absoluta do Site
$root = dirname( $_SERVER["PHP_SELF"] ) == DIRECTORY_SEPARATOR ? "" : dirname( $_SERVER["PHP_SELF"] );