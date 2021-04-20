<?php 
include('Classes/classUrl.php');
include('Classes/classCrud.php');
include('Includes/variaveis.php');
include('Includes/head.php');

$objUrl = new classUrl();

$objUrl->getURL();

include('Includes/footer.php');
