<?php
require '../autoload.php';
require '../Config/variaveis.php';

    $user = new classUsuario();

    if ($user->logout()) {
        header('Location: ../login');  
    }
?>