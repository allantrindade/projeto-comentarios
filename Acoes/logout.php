
    <?php
    include('../Includes/variaveis.php');
    include('../Classes/classUsuario.php');
    $user = new classUsuario();

    if ($user->logout()) {
        header('Location: ../login');  
    }
?>