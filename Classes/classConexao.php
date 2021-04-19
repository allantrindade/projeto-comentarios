<?php
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
            $this->server = "127.0.0.1";
            $this->port = "3306";
            $this->user = "root";
            $this->password = "";
            $this->database = "bdcomentarios"; 
        }
        
        //MÉTODO PARA CONECTAR COM O BANCO DE DADOS
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