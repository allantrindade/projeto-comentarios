<?php
    class classUrl {

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