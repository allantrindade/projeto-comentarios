<?php
    class classPassword {

        //METODO PARA CRIAR O HASH DA SENHA PARA SER GRAVADA NO BD
        public function passwordHash($senha) {
            return password_hash($senha, PASSWORD_DEFAULT);
        }

        //METODO PARA COMPARAR SE A SENHA TA IGAUL O HASH NO BD
        public function verifyHash($senha, $hash) {
            return password_verify($senha, $hash);
        }
    }