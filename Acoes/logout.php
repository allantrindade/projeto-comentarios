<?php
    include('../Classes/classUsuario.php');
    $u = new classUsuario();

    if ($u->logout()) {
        echo "<script>window.location.href='../Pages/login.php'</script>";   
    }
?>
    