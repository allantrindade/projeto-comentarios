<?php

namespace Classes;

    /**
     * classImagem
     * Classe responsável por realizar as operaçoes de gravação e upload de imagens.
     * 
     */
    class classImagem  {
                  
         /**
          * gerarExtensao
          * Método responsável por retornar a extensão de uma imagem.
          *
          * @param  string $str     = String com o nome completo da imagem.
          * @return string $ext     = Retorna a extensão em letras minusculas.
          */
         public function gerarExtensao($str) {
            $i = strrpos($str,".");
            if (!$i) {return "";}
            $l = strlen($str) - $i;
            $ext = substr($str,$i+1,$l);
            return strtolower($ext);
        }

                
        /**
         * gerarNome
         * Método responável por gerar o nome da imagem concactenado com a extensão em MD5. 
         * 
         * @param  array $foto  = Vem do POST['foto'], contendo as informações da imagem carregada no input.
         * @return string       = Retorna uma string com o nome completo da imagem em MD5.
         */
        public function gerarNome($foto)
        {
            $ext = $this->gerarExtensao($foto['name']);
            $foto = md5($foto['name']);
            $nomeCompleto = "{$foto}.{$ext}";
            return $nomeCompleto;
        }

        /**
         * gravarFoto
         * Método reponsável por mover o arquivo upado no input para a pasta Images/Usuarios
         * 
         * @param  array $foto  = Vem do POST['foto'], contendo as informações da imagem carregada no input.
         * 
         */
        public function gravarFoto($foto){
            $imagem = ($foto['tmp_name']);
            move_uploaded_file($imagem, "../Images/Usuarios/{$this->gerarNome($foto)}");
        }
    }