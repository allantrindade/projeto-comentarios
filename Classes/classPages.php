<?php
    class classPages {

        //Atributos
        private $html;

        //Metodo retorna uma string com os cards comentários
        public function tabelaComentarios(): string {
            $crud = new classCrud();
            $result = $crud->selectDB('*', 'comentarios', 'ORDER BY id DESC', array());
            while ($fetch = $result->fetch(PDO::FETCH_OBJ)) {
                $data_criacao = date('d/m/Y H:i', $fetch->data_criacao);
                $data_edicao = 'Editado: ' . date('d/m/Y H:i', $fetch->data_edicao);
                $usuario = $crud->selectDB('imagem', 'usuarios', "WHERE usuario ='{$fetch->usuario}'", array())->fetch(PDO::FETCH_OBJ);
                if (empty($usuario->imagem)){
                    $usuario = new \stdClass();
                    $usuario->imagem = 'anonimo.jpg';
                }
                $this->html .= "
                <div class='card mb-2'>
                    <div class='row no-gutters'>
                        <div class='col-md-2'>
                            <img class='img-thumbnail rounded-circle' style='width: 200px; height: 130px;' alt='Usuário' src='./Images/Usuarios/{$usuario->imagem}'/>
                        </div>
                        <div class='col-md-10'>
                            <div class='card-body p-2'>
                                <span class='float-right text-muted'>{$data_criacao}</span>
                                <h5 class=1card-title mb-0 font-weight-normal1>{$fetch->id} - {$fetch->usuario}</h5>
                                <p class='card-subtitle mb-1 text-muted'><small>{$fetch->email}</small></p>
                                <p class='card-text font-weight-light'>{$fetch->comentario}</p>
                                <p class='card-text'><small class='text-muted'>{$data_edicao}</small>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
                                <span class='float-right mr-2'><a href='./Acoes/deletar.php?id={$fetch->id}&user={$fetch->usuario}'>
                                <img src='./Images/Icones/deletar.png' title='Deletar' alt='Deletar'></a></span>
                                <span class='float-right mr-3'><a href='?id={$fetch->id}&user={$fetch->usuario}'><img src='./Images/Icones/editar.png' title='Editar' alt='Editar'></a></span>
                                </p>
                            </div>
                        </div>
                    </div>    
                </div>";                  
            }
            return $this->html; 
        }
    }