<?php
require 'classConexao.php';

    /**
     * classCrud
     * Classe responsável por executar as operações de CRUD (Create, Read, Update, Delete).
     * 
     */
    class classCrud  extends classConexao {

        //ATRIBUTOS
        private $crud;
        private $cont;

                
        /**
         * prepareStmt
         * Método responsável executar uma instrução preparada no Banco de Dados.
         * 
         * @param string $query      = Query que será executada no Banco de Dados.
         * @param string $parametros = Parâmetros que contém na instrução.
         * 
         */
        public function prepareStmt($query, $parametros) {
            $this->countParameters($parametros);
            $this->crud = $this->conectDB()->prepare($query);
            if ($this->cont > 0) {
                for ($i=1; $i <= $this->cont; $i++) {
                    $this->crud->bindValue($i, $parametros[$i - 1]);
                }
            }       
            $this->crud->execute();
        }

                
        /**
         * countParameters
         * Método responsável por contar os parâmetros de um array.
         *
         * @param  array $parametros = Parâmetros que contém na instrução.
         * @return string $this->cont = Retorna para o $cont a quantidade de parâmetros que contém no array.
         */
        public function countParameters($parametros){
            $this->cont=count($parametros);
            
        }

                
        /**
         * insertDB
         * Método responsável por inserir dados no Banco de Dados.
         * 
         * @param  string $tabela       = Tabela que os dados serão inseridos. 
         * @param  string $valores      = Valores que serão inseridos na tabela (????).
         * @param  array  $parametros   = Parâmetros que seráo preparados no bindValue  
         * @param  mixed  $atributos    = Atributos da tabela.
         * @return string               = Retorna a string com a query executada.
         */
        public function insertDB($tabela, $valores, $parametros, $atributos) {
            $query = "INSERT INTO {$tabela} ({$atributos}) VALUES ({$valores})";
            $this->prepareStmt($query, $parametros);
            return $this->crud;
        }

                
        /**
         * selectDB
         * Método responsável por realizar uma consulta no Banco de Dados.
         * 
         * @param  string $atributos       = Atributos da tabela.
         * @param  string $tabela          = Nome da tabela.
         * @param  string $condicao        = Condição da query a ser executada.
         * @param  array  $parametros      = Parâmetros que seráo preparados no bindValue, pode ser vazio.
         * @return string                  = Retorna a string com a query executada.
         */
        public function selectDB($atributos, $tabela, $condicao, $parametros){
            $query = "SELECT {$atributos} FROM {$tabela} {$condicao}";
            $this->prepareStmt($query, $parametros);
            return $this->crud;
        }

                
        /**
         * deleteDB
         * Método responsável deletar um dado no Banco de Dados.
         * 
         * @param  mixed $tabela        = Nome da tabela. 
         * @param  mixed $condicao      = Condição da query a ser executada.
         * @param  mixed $parametros    = Parâmetros que seráo preparados no bindValue.
         * @return string               = Retorna a string com a query executada.
         */
        public function deleteDB($tabela, $condicao, $parametros) {
            $query = "DELETE FROM {$tabela} WHERE id = {$condicao}";
            $this->prepareStmt($query, $parametros);
            return $this->crud;
        }

                
        /**
         * updateDB
         * Método responsável atualizar um dado no Banco de Dados.
         * 
         * @param  mixed $tabela        = Nome da tabela.
         * @param  mixed $set           = Atributos a serem atualizados.
         * @param  mixed $condicao      = Condição da query a ser executada.
         * @param  mixed $parametros    = Parâmetros que seráo preparados no bindValue.
         * @return string               = Retorna a string com a query executada.
         */
        public function updateDB($tabela, $set, $condicao, $parametros) {
            $query = "UPDATE {$tabela} SET {$set} WHERE id = '{$condicao}'";
            $this->prepareStmt($query, $parametros);
            return $this->crud;
            }
    }