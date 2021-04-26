<?php
require '../autoload.php';
require '../Includes/variaveis.php';

    $user = new classUsuario();

    if ($user->logout()) {
        header('Location: ../login');  
    }
?>