<?php
    class classUrl {

        public function getURL($url=[]) :string {         
            if (isset($url[1])) {
                return false;
            } elseif (file_exists("Pages/{$url[0]}.php")) {
                return true;
            } else {
                return false;
            }
            return $url;
        }
    }