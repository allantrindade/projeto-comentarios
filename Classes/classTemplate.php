<?php
    class Template
    {
        protected $page;
        protected $tags = [];
    
        public function __construct($page)
        {
            $this->page = $page;
        }

        public function set($key, $value)
        {
            $this->tags[$key] = $value;
        }
     
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