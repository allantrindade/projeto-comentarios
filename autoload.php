<?php
    //Função responsável por fazer um require ao instanciar um objeto de alguma Classe.
    spl_autoload_register(function($file) {
        if (file_exists(__DIR__ . '/Classes/' . $file . '.php')) {
            require __DIR__ . '/Classes/' . $file . '.php';
        }
    });
?>