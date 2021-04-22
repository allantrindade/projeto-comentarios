<?php 
include 'Classes/classUrl.php';
include 'Classes/classTemplate.php';
include 'Classes/classPages.php';
include 'Classes/classCrud.php';
include 'Includes/variaveis.php';

include 'Includes/head.html';

$objPages = new classPages();
$objUrl = new classUrl();


switch ($objUrl->getURL($url)) {
    case 'home':
        $template = new Template("pages/home.html");
        $template->set("usuariologado", $usuarioLogado);
        $template->set("acao", $acao);
        $template->set("idGet", $idGet);
        $template->set("openClass", $objPages->openClass($usuarioLogado));
        $template->set("closeClass", $objPages->closeClass($usuarioLogado));
        $template->set("comentarios", $objPages->getComentarios($usuarioLogado));
        $template->set("root", $root);
        echo $template->render();
    break;
    case 'login':
        $template = new Template("pages/login.html");
        $template->set("sessao", $usuarioLogado);
        $template->set("root", $root);
        echo $template->render();
    break;
    case 'cadastro':
        $template = new Template("pages/cadastro.html");
        $template->set("sessao", $usuarioLogado);
        $template->set("root", $root);
        echo $template->render(); 
    break;
    default:
        $template = new Template("pages/erro.html");
        echo $template->render();
    break;
}
include 'Includes/footer.html';
