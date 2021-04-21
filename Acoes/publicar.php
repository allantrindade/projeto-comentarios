<?php
include('../Includes/variaveis.php');
include('../Classes/classCrud.php');



//Evento botão Publicar Comentários em Publicações
if (isset($_POST['btnPublicar']) && $_POST['acao'] == 'Publicar') {
    if ($usuarioLogado == '' || $comentario == '') {
        $mensagemErro = "<script>alert('Preencher o comentário');window.location.href='../home'</script>";
        echo $mensagemErro;
    } 
    elseif ($mensagemErro === ""){
        $crud = new classCrud();
        $crud->insertDB('comentarios', '?,?,?,?', array(isset($_POST['anonimo']) ? 'anônimo' : $usuarioLogado,
        isset($_POST['anonimo']) ? 'anônimo' : $emailLogado, $data, $comentario), 'usuario, email, data_criacao, comentario');
        echo "<script>alert('Comentário Inserido');window.location.href='../home'</script>";
    }
}
//Evento botão Publicar Comentários em Edições
if (isset($_POST['btnPublicar']) && $_POST['acao'] == 'Editar') {
    if ($usuarioLogado == '' || $comentario == '') {
        $mensagemErro = "<script>alert('Preencher o comentário');window.location.href='../home'</script>";
        echo $mensagemErro;
    } 
    elseif ($mensagemErro === ""){
        $crud = new classCrud();
        $crud->updateDB('comentarios', 'usuario = ?, email = ?, data_edicao = ?, comentario = ?',
        $_POST['idGet'], array(isset($_POST['anonimo']) ? 'anônimo' : $usuarioLogado, isset($_POST['anonimo']) ? 'anônimo' : $emailLogado, $data, $comentario)); 
        echo "<script>alert('Comentário Editado');window.location.href='../home'</script>";
    }
}