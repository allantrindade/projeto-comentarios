<?php

use Classes\classUsuario;

require_once '../vendor/autoload.php';
require_once '../Includes/variaveis.php';

    $user = new classUsuario;

    if ($user->logout()) {
        header('Location: ../login');  
    }
?>