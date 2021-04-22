<?php
    class classPages {

        //Metodo esconde div htmls
        public function openClass ($session): string {
            $html = $session === 'anônimo' ? "<div class='d-none'>" : "";
            return $html;
            }

        //Metodo esconde div htmls
        public function closeClass ($session): string {
            $html = $session === 'anônimo' ? "</div>" : "";
            return $html;
            }

        //Metodo retorna a quantidade comentários
        public function getContComentarios() {
            $crud = new classCrud();
            $cont = $crud->selectDB('COUNT(*)', 'comentarios', '', array())->fetchColumn();
            return $cont;
        }
        //Metodo retorna uma string com os cards comentários
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
                    <div class='row no-gutters'>
                        <div class='col-md-2'>
                            <img class='img-thumbnail border-0' style='width: 200px; height: 130px;' alt='Usuário' src='{{root}}/Images/Usuarios/{$usuario->imagem}'/>
                        </div>
                        <div class='col-md-10 bg-white'>
                            <div class='card-body p-2'>
                                <span class='float-right text-muted'>{$data_criacao}</span>
                                <h5 class=1card-title mb-0 font-weight-normal1>{$fetch->id} - {$fetch->usuario}</h5>
                                <p class='card-subtitle mb-1 text-muted'><small>{$fetch->email}</small></p>
                                <p class='card-text font-weight-light'>{$fetch->comentario}</p>
                                <p class='card-text'><small class='text-muted'>{$data_edicao}</small>
                                {$this->openClass($session)}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
                                    <span class='float-right mr-2'><a href='{{root}}/Acoes/deletar.php?id={$fetch->id}&user={$fetch->usuario}'><img src='{{root}}/Images/Icones/deletar.png' title='Deletar' alt='Deletar'></a></span>
                                    <span class='float-right mr-3'><a href='{{root}}/home/{$fetch->id}'><img src='{{root}}/Images/Icones/editar.png' title='Editar' alt='Editar'></a></span>
                                {$this->closeClass($session)}
                                </p>
                            </div>
                        </div>
                    </div>    
                </div>";                  
            }
            return $html; 
        }
    }