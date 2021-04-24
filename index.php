<?php 
include 'Classes/classUrl.php';
include 'Classes/classTemplate.php';
include 'Classes/classPages.php';
include 'Classes/classCrud.php';
include 'Includes/variaveis.php';


$objPages = new classPages();
$objUrl = new classUrl();

//Template Header HTML
$header = new Template("includes/header.html");
$header->set("usuariologado", $usuarioLogado);
$header->set("root", $root);
echo $header->render();


//Template Main HTML
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
        $template->set("cont", $objPages->getContComentarios());
        echo $template->render();
    break;
    case 'login':
        $template = new Template("pages/login.html");
        $template->set("usuariologado", $usuarioLogado);
        $template->set("root", $root);
        echo $template->render();
    break;
    case 'cadastro':
        $template = new Template("pages/cadastro.html");
        $template->set("usuariologado", $usuarioLogado); //Usuário logado
        $template->set("root", $root); //Local Absoluto do Site
        echo $template->render(); 
    break;
    case 'consulta':
        $template = new Template("pages/consulta.html");
        $template->set("usuariologado", $usuarioLogado);
        $template->set("root", $root);
        $template->set("cont", $objPages->getContUsuarios());
        $template->set("usuarios", $objPages->getUsuarios());
        echo $template->render(); 
    break;
    default:
        $template = new Template("pages/erro.html");
        echo $template->render();
    break;
}

//Template FOOTER HTML
$template = new Template("includes/footer.html");
echo $template->render();


if ($mensagemErro != '') {
    echo "<script>swal('{$mensagemErro}', '' ,'{$icon}');</script>";
    $_SESSION['msgerro'] = '';
    $_SESSION['icon'] = '';
}