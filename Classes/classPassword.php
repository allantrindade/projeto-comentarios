<?php
    
    /**
     * classPassword
     * Classe responsável por criar os métodos de password_hash.
     */
    class classPassword {
               
        /**
         * passwordHash
         * Método recebe uma senha e retorna o hash.
         * 
         * @param  string $senha    = Senha a ser criptografrada.
         * @return string           = Retorna o Hash da senha.
         */
        public function passwordHash($senha) {
            return password_hash($senha, PASSWORD_DEFAULT);
        }
      
        /**
         * verifyHash
         * Verifica se o hash informado confere com a senha informada.
         *
         * @param  string $senha    = Senha a ser comparada com o Hash.
         * @param  string $hash     = Hash a ser comparado com a senha.
         * @return bool             = Se o hash estiver OK retorna TRUE senão FALSE.
         */
        public function verifyHash($senha, $hash) {
            return password_verify($senha, $hash);
        }
    }