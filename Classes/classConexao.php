<?php
    
    /**
     * classConexao
     * Classe responsável por estabelecer a conexão com o Banco de Dados.
     */
    class classConexao {
        //ATRIBUTOS
        private $server;
        private $port;
        private $user;
        private $password;
        private $database;
        private $pdo;

        //CONSTRUTOR
        public function __construct() {
            $this->server = SERVER;
            $this->port = PORT;
            $this->user = USER;
            $this->password = PASSWORD;
            $this->database = DATABASE; 
        }
                      
        /**
         * conectDB
         * Método responsável por conectar com o Banco de Dados.
         * @return bool Retorna TRUE se realizar a conexão. 
         */
        public function conectDB() {
            try {
                if(!isset($this->pdo )){
                    $this->pdo = new PDO("mysql:host={$this->server};port={$this->port};dbname={$this->database}", $this->user, $this->password);
                    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                return $this->pdo;
            } catch (PDOException $erro) {
                echo "Erro na conexão:" . $erro->getMessage();
                exit;
            }
        }
}
?>