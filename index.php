<?php 
include 'Classes/classUrl.php';
include 'Classes/classTemplate.php';
include 'Classes/classPages.php';
include 'Classes/classCrud.php';
include 'Includes/variaveis.php';

include 'Includes/head.html';

$objPages = new classPages();
$objUrl = new classUrl();

if ($objUrl->getURL($url) == 'home') {
    $template = new Template("pages/home.html");
    $template->set("sessao", $_SESSION['loggedin']);
    $template->set("acao", $acao);
    $template->set("comentarios",$objPages->tabelaComentarios());
    echo $template->render();

} elseif ($objUrl->getURL($url) == 'login') {
    $template = new Template("pages/login.html");
    $template->set("sessao", $_SESSION['loggedin']);
    echo $template->render();

} elseif ($objUrl->getURL($url) == 'cadastro') {
    $template = new Template("pages/cadastro.html");
    $template->set("sessao", $_SESSION['loggedin']);
    echo $template->render();
}
else {
    include "Pages/erro.html";
}

include 'Includes/footer.html';
