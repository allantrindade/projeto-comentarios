 <?php 

    function logout() {
        session_start();
        $_SESSION['usuario'] = 'anônimo';
        $_SESSION['email'] = '';
        header("Location: ../login");
    }

    logout();