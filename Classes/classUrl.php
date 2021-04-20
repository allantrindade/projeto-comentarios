<?php
    class classUrl {

        public function getURL() {
            $url = explode("/", $_GET['url'] ?? 'home');

            if (isset($url[1])) {
                include "Pages/erro.php";
            } elseif (file_exists("Pages/{$url[0]}.php")) {
                include "Pages/{$url[0]}.php";
            } else {
                include "Pages/erro.php";
            }
        }
    }