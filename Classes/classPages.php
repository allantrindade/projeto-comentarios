<?php
    
    /**
     * classPages
     * Classe responsável por executar as funções em PHP e retornar o HTML para o Index.
     * 
     */
    class classPages {
      
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
            $crud = new classCrud();
            $cont = $crud->selectDB('COUNT(*)', 'comentarios', '', array())->fetchColumn();
            return $cont;
        }
        /**
         * getContComentarios
         * Método responsável por contar os usuários na tabela Usuarios.
         *
         * @return string $cont = Retorna a quantidade de usuários cadastrados.
         */
        public function getContUsuarios(): string {
            $crud = new classCrud();
            $cont = $crud->selectDB('COUNT(*)', 'usuarios', '', array())->fetchColumn();
            return $cont;
        }       
        /**
         * getComentarios
         * Método responsável por realizar a busca no banco de dados e criar as tags
         * para montagem dos cards no HTML  
         *
         * @param  string $session  = Sesão do usuário logado.
         * @return string $html     = Retorna o HTML com os cards de comentários montados.
         */
        public function getComentarios($session): string {
            $html = '';
            $crud = new classCrud();
            $result = $crud->selectDB('*', 'comentarios', 'ORDER BY id DESC', array());
            while ($fetch = $result->fetch(PDO::FETCH_OBJ)) {
                $data_criacao = date('d/m/Y H:i', $fetch->data_criacao);
                $data_edicao = $fetch->data_edicao != "" ? 'Editado: ' . date('d/m/Y H:i', $fetch->data_edicao) : "";
                $usuario = $crud->selectDB('imagem', 'usuarios', "WHERE usuario ='{$fetch->usuario}'", array())->fetch(PDO::FETCH_OBJ);
                if (empty($usuario->imagem)){
                    $usuario = new \stdClass();
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
                                <h5 class='card-title mb-0 font-weight-normal'>{$fetch->id}- {$fetch->usuario}</h5>
                                <p class='card-subtitle mb-1 text-muted'><small>{$fetch->email}</small></p>
                                <p class='card-text font-weight-light'>{$fetch->comentario}</p>
                                <p class='card-text'><small class='text-muted'>{$data_edicao}</small>
                                {$this->openClass($session)}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
                                    <span class='float-right'><a href='{{root}}/Acoes/deletar.php?id={$fetch->id}&user={$fetch->usuario}'><img src='{{root}}/Images/Icones/deletar.png' title='Deletar' alt='Deletar'></a></span>
                                    <span class='float-right mr-2'><a href='{{root}}/home/{$fetch->id}'><img src='{{root}}/Images/Icones/editar.png' title='Editar' alt='Editar'></a></span>
                                {$this->closeClass($session)}
                                </p>
                            </div>
                        </div>
                    </div>    
                </div>";                  
            }
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
            $crud = new classCrud();
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