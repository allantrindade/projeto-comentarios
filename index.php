<?php 
include('Classes/classUrl.php');
include('Classes/classCrud.php');
include('Includes/variaveis.php');
include('Includes/head.php');

$objUrl = new classUrl();
$url = explode("/", $_GET['url'] ?? 'home');

if ($objUrl->getURL($url) == TRUE) {
    include "Pages/{$url[0]}.php";
} else {
    include "Pages/erro.php";
}


include('Includes/footer.php');
