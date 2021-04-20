 <?php 
    function logout() {
        session_start();
        $_SESSION['loggedin'] = 'Usuário não Logado';
        $_SESSION['email'] = '';
        header("Location: ../login");
    }

    logout();