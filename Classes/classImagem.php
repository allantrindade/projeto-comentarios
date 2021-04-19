<?php
    class classImagem
    {

         //METODO PARA RETORNAR A EXTENSÃO DO ARQUIVO
         public function gerarExtensao($str) {
            $i = strrpos($str,".");
            if (!$i) {return "";}
            $l = strlen($str) - $i;
            $ext = substr($str,$i+1,$l);
            return strtolower($ext);
        }

        //METODO GERAR NOME DA FOTO + EXTENSÃO
        public function gerarNome($foto)
        {
            $ext = $this->gerarExtensao($foto['name']);
            $foto = md5($foto['name']);
            $nomeCompleto = "{$foto}.{$ext}";
            return $nomeCompleto;
        }

        //METODO PARA GRAVAR O ARQUIVO NA PASTA IMAGES
        public function gravarFoto($foto){
            $imagem = ($foto['tmp_name']);
            move_uploaded_file($imagem, "../Images/Usuarios/{$this->gerarNome($foto)}");
        }
    }