<?php
    include('../Includes/head.php');
    include('../Acoes/logar.php');
?>


<body class='container bg-light'>
    <div class="card text-center p-5 mx-auto" style="width:50vw">
        <form action="login.php" method="POST">       
                <img class="rounded-circle" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                    <h1 class="h3 mt-3 mb-3 font-weight-normal">Sistema de Comentários</h1>
                    <p>Seja bem-vindo!</p>
                <div class="form-group col-8 mx-auto">
                    <input type="usuario" name="usuario" id="inputUsuario" class="form-control" placeholder="Usuário">
                </div>
                <div class="form-group col-8 mx-auto">
                    <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha">
                </div>
                
                <div class="mx-auto col-5 mb-1">
                    <button class="btn btn-lg btn-success btn-block"  name="btnLogar" type="submit">Acessar</button>
                    <a href="../Pages/index.php" class="btn btn-lg btn-outline-success btn-block">Comentários</a>
                </div>
                <small><a href="cadastro.php">Cadastre-Se</a></small>
            </form>    
    </div>
</body>
<?php include('../Includes/footer.php')?>