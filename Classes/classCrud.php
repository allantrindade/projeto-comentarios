<?php
include('../Classes/classConexao.php');

    class classCrud extends classConexao {

        //ATRIBUTOS
        private $crud;
        private $cont;

        //METODO PARA PREPARAÇÕES
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

        // METODO CONTAGAEM DE PARAMETROS PARA USAR NO BIND VALUES
        public function countParameters($parametros){
            $this->cont=count($parametros);
        }

        // METODO PARA INSERIR NO BANCO DE DADOS
        public function insertDB($tabela, $condicao, $parametros, $atributos) {
            $query = "INSERT INTO {$tabela} ({$atributos}) VALUES ({$condicao})";
            $this->prepareStmt($query, $parametros);
            return $this->crud;
        }

        // METODO PARA SELECIONAR OS DADOS
        public function selectDB($campos, $tabela, $condicao, $parametros){
            $query = "SELECT {$campos} FROM {$tabela} {$condicao}";
            $this->prepareStmt($query, $parametros);
            return $this->crud;
        }

         // METODO PARA DELETAR ALGUM DADO
        public function deleteDB($tabela, $condicao, $parametros) {
            $query = "DELETE FROM {$tabela} WHERE id = {$condicao}";
            $this->prepareStmt($query, $parametros);
            return $this->crud;
        }

        // METODO PARA ATUALIZAR ALGUM DADO
        public function updateDB($tabela, $set, $condicao, $parametros) {
            $query = "UPDATE {$tabela} SET {$set} WHERE id = '{$condicao}'";
            $this->prepareStmt($query, $parametros);
            return $this->crud;
            }
    }