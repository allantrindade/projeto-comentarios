<?php
require 'classConexao.php';

    /**
     * classUsuario
     * Classe responsável por criar a interação do usuario ao sistema.
     */
    class classUsuario extends classConexao {
                  
        /**
         * login
         * Método reponsável por realizar o login do usuário no sistema.
         * @param  string $usuario      = String do input usuario.
         * @param  string $senha        = String do input senha. 
         * @return bool                 = Se logado com sucesso retorna TRUE senão FALSE
         */
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
                    $_SESSION['usuario'] = $dado['usuario'];
                    $_SESSION['email'] = $dado['email'];
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            } 
        }
        
        /**
         * logout
         * Método responsável por fazer o logout do usuário no site.
         *
         * @return bool     = Retorna true;
         */
        public function logout() {
            $_SESSION['usuario'] = 'anônimo';
            $_SESSION['email'] = 'anônimo';
            return true;
        }
    }