<?php
include_once('../Classes/classConexao.php');

    class classUsuario extends classConexao {

        //METODO LOGAR
        public function login($usuario, $senha){
            $h = new classPassword();
            $query = "SELECT * FROM usuarios WHERE usuario = :usuario";
            $stmt = $this->conectDB()->prepare($query);
            $stmt->bindValue("usuario", $usuario);
            $stmt->execute();          
            
            if ($stmt->rowCount() > 0) {
                $dado = $stmt->fetch();              
                if ($h->verifyHash($senha ,$dado['senha'])) {
                    session_start();
                    $_SESSION['loggedin'] = $dado['usuario'];
                    $_SESSION['email'] = $dado['email'];
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            } 
        }

        //METODO LOGOUT
        public function logout() {
            session_start();
            $_SESSION['loggedin'] = 'Usuário não Logado';
            $_SESSION['email'] = '';
            return true;
        }
    }