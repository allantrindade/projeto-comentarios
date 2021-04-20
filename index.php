<?php 


$url = explode("/", $_GET['url'] ?? 'home'); 
var_dump($url);
if (isset($url[1])){
    include "Pages/erro.php";     
} elseif(file_exists("Pages/{$url[0]}.php")) {
    include "Pages/{$url[0]}.php";
} else {
    include "Pages/erro.php";
}
