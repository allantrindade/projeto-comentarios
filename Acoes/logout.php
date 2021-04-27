<?php

use Models\Classes\classUsuario;

require_once '../vendor/autoload.php';
require_once '../Config/variaveis.php';

    $user = new classUsuario;

    if ($user->logout()) {
        header('Location: ../login');  
    }
?>