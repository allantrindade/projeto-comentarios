<?php
    
    /**
     * classTemplate
     * Classe responsável por criar os metódos para capturar as tags "{{ }}" na página HTML.
     */
    class classTemplate
    {
        protected $page;
        protected $tags = [];
    
        public function __construct($page)
        {
            $this->page = $page;
        }
        
        /**
         * set
         * Método responsável por setar as tags a serem trocadas
         * 
         * @param  string $key      = Chave a ser procurada na página.
         * @param  string $value    = Valor a ser trocado pelo chave na página.
         * @return array             = Retorna para o array do atributo $tags.
         */
        public function set($key, $value)
        {
            $this->tags[$key] = $value;
        }
             
        /**
         * render
         * Método reponsável por renderizar a pagina em html.
         * 
         * @return string       = Retorna uma string com o template da pagina.
         */
        public function render()
        {
            if (!file_exists($this->page)) {
                return "Erro ao carregar arquivo de template: '$this->page'";
            }
            $template = file_get_contents($this->page);
            foreach ($this->tags as $key => $value) {
                $tagToReplace = '{{' .$key. '}}';
                $template = str_replace($tagToReplace, $value, $template);
            }
            return $template;
        }
    }