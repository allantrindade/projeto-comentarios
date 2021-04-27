<?php

use Models\Classes\classCrud;

require_once '../vendor/autoload.php';
require_once '../Includes/variaveis.php';

if (($id == '')) {
    $_SESSION['msgerro'] = 'Preencher o campo id para excluir!';
    $_SESSION['icon'] = 'error';
    header('Location: ../home');
}
elseif ($usuarioLogado != $userGet && $userGet != 'anônimo') {
    $_SESSION['msgerro'] = 'Você pode excluir somente o seu comentário!';
    $_SESSION['icon'] = 'error';
    header('Location: ../home');
}
elseif ($mensagemErro === '') {
    $crud = new classCrud;
    $crud->deleteDB('comentarios', '?', array($id));
    $_SESSION['msgerro'] = 'Comentário Excluído.';
    $_SESSION['icon'] = 'success';
    header('Location: ../home');
}