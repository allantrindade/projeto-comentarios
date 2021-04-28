<?php

namespace Models\Classes;

use PDO;
use stdClass;

    /**
     * classPages
     * Classe responsável por executar as funções em PHP e retornar o HTML para o Index.
     * 
     */
    class classPages {
      
        private $crud;
        
        /**
         * __construct
         * Método construtor retorna um objeto da classCrud.
         * 
         * @return object    = Define o atributo $crud como um objeto da classCrud.
         */
        public function __construct() {
         $this->crud = new classCrud;   
        }

        /**
         * openClass
         * Método responsável por criar uma div com a classe "d-none" do Bootstrap.
         *
         * @param  string $session  = Sesão do usuário logado. 
         * @return string $html     = Retorna a tag HTML "div class='d-none'".
         */
        public function openClass ($session): string {
            $html = $session === 'anônimo' ? "<div class='d-none'>" : "";
            return $html;
            }
        
        /**
         * closeClass
         * Método responsável por fechar uma div.
         * 
         * @param  string  $session  = Sesão do usuário logado.
         * @return string $html     = Retorna a tag HTML "/div".
         */
        public function closeClass ($session): string {
            $html = $session === 'anônimo' ? "</div>" : "";
            return $html;
            }
            
        /**
         * getContComentarios
         * Método responsável por contar os comentários na tabela Comentarios.
         *
         * @return string $cont = Retorna a quantidade de comentários.
         */
        public function getContComentarios(): string {
            $cont = $this->crud->selectDB('COUNT(*)', 'comentarios', '', array())->fetchColumn();
            return $cont;
        }
        /**
         * getContComentarios
         * Método responsável por contar os usuários na tabela Usuarios.
         *
         * @return string $cont = Retorna a quantidade de usuários cadastrados.
         */
        public function getContUsuarios(): string {
            $cont = $this->crud->selectDB('COUNT(*)', 'usuarios', '', array())->fetchColumn();
            return $cont;
        }       
        /**
         * getComentarios
         * Método responsável por realizar a busca no banco de dados e criar as tags
         * para montagem dos cards no HTML.  
         *
         * @param  string $session  = Sesão do usuário logado.
         * @return string $html     = Retorna o HTML com os cards de comentários montados.
         */
        public function getComentarios($session): string {
            $html = '';
            $inicioExibir = (COMENTS * $GLOBALS['pagina']) - COMENTS;
            $comentarios = $this->crud->selectDB('*', 'comentarios', "ORDER BY id DESC LIMIT {$inicioExibir},". COMENTS, array())->fetchAll(PDO::FETCH_OBJ);
            if (!empty($comentarios)) {
               foreach ($comentarios as $comentario) {
                   $data_criacao = date('d/m/Y H:i', $comentario->data_criacao);
                   $data_edicao = $comentario->data_edicao != "" ? 'Editado: ' . date('d/m/Y H:i', $comentario->data_edicao) : "";
                   $usuario = $this->crud->selectDB('imagem', 'usuarios', "WHERE usuario ='{$comentario->usuario}'", array())->fetch(PDO::FETCH_OBJ);
                   if (empty($usuario->imagem)) {
                       $usuario = new stdClass;
                       $usuario->imagem = 'anonimo.jpg';
                   }
                   $html .= "
                <div class='card mb-2 border border-secondary p-1'>
                    <div class='row'>
                        <div class='col-md-2 col-4'>
                            <img class='img-fluid' alt='Usuário' style='width: 200px; height: 130px;' src='{{root}}/Images/Usuarios/{$usuario->imagem}'/>
                        </div>
                        <div class='col-md-10 col-8'>
                            <div class='card-body p-1'>
                                <span class='float-right text-muted'>{$data_criacao}</span>
                                <h5 class='card-title mb-0 font-weight-normal'>{$comentario->id}- {$comentario->usuario}</h5>
                                <p class='card-subtitle mb-1 text-muted'><small>{$comentario->email}</small></p>
                                <p class='card-text font-weight-light'>{$comentario->comentario}</p>
                                <small class='text-muted'>{$data_edicao}</small>
                                {$this->openClass($session)}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
                                    <span class='float-right'><a title='Deletar' aria-label='Deletar' href='{{root}}/Acoes/deletar.php?id={$comentario->id}&user={$comentario->usuario}'><i class='text-danger fa fa-trash fa-2x'></i></a></span>
                                    <span class='float-right mr-2'><a title='Editar' href='{{root}}/home/editar/{$comentario->id}/'><i class='text-info fa fa-pencil-square fa-2x' aria-hidden='true'></i></a></span>
                                {$this->closeClass($session)}                         
                            </div>
                        </div>
                    </div>   
                </div>";
               }
           } else {
               $html = "<h4 class='text-center'>Ainda não temos comentários</h4>";
           }
            return $html; 
        }
        
        /**
         * getPaginacao
         * Método responsável por retornar a quantidade necessária de páginas para exbir
         * os comentários de acordo com a CONST COMENTS definida em Config/variaveis.php.
         * 
         * @return string       = Retorna uma string com lista ordenada com o nº de páginas.
         */
        public function getPaginacao(): string {
            $crud = new classCrud;
            $html = "<nav><ul class='pagination pagination-sm justify-content-center'>";
            //Seleciona todos os comentários da tabela comentarios, e armazena em $totalComentarios
            $totalComentarios = $crud->selectDB('*', 'comentarios', 'ORDER BY id', array())->fetchAll(PDO::FETCH_OBJ);
            //Armazena a quantidade necessária de paginas para exibir os comentários em cada pág em $totalPaginas
            $totalPaginas = ceil(count($totalComentarios) / COMENTS);
            for ($i=1; $i <= $totalPaginas ; $i++) {
                if ($i == $GLOBALS['pagina']) {
                    $html .= "
                    <li class='page-item active'><a class='page-link' href='{{root}}/home/{$i}/'>{$i}</a></li>";
                } else {
                    $html .= "
                    <li class='page-item'><a class='page-link' href='{{root}}/home/{$i}/'>{$i}</a></li>";
                }                    
            }
            $html .= "</ul></nav>";           
            return $html;
        }
        
        /**
         * getUsuarios
         * Método responsável por realizar a busca de usuários no BD, retorna
         * tags HTML de uma tabela com os dados. 
         * 
         * @return string       $html     = Retorna o HTML com a tabela de usuarios.
         */
        public function getUsuarios(): string {
            $html = '';
            $crud = new classCrud;
            $result = $crud->selectDB('id, usuario, email, data_cadastro', 'usuarios', 'ORDER BY id ASC', array());
            while ($fetch = $result->fetch(PDO::FETCH_OBJ)) {  
                $data_cadastro = date('d/m/Y', $fetch->data_cadastro);                   
                $html .= "
                    <tr>
                        <td>$fetch->id</td>
                        <td>$fetch->usuario</td>
                        <td>$fetch->email</td>
                        <td>$data_cadastro</td>
                    <tr> 
                    ";                  
            }
            return $html; 
        }
    }