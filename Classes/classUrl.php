<?php
    
    /**
     * classUrl
     * Classe responsável criar a URL amigável.
     */
    class classUrl {
                
        /**
         * getURL
         * Método responsável por retornar a URL amigável
         *  
         * @param  array $url      = Array com a URL quebrada em pedaços através do Explode.
         * @return string          = Se a pagina digitada na URL existir ele retorna a URL amigável.
         */
        public function getURL($url=[]): string {
            if (isset($url[2]) && $url[1] == '') {
                return false;
            } elseif (file_exists("Pages/{$url[0]}.html")) {
                return $url[0];
            } else {
                return false;
            }	
	    }
    }