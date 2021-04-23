
    <?php
    include('../Includes/variaveis.php');
    include('../Classes/classUsuario.php');
    $user = new classUsuario();

    if ($user->logout()) {
        echo "<script>window.location.href='../login'</script>";   
    }
?>