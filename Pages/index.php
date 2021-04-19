<?php 
    
    include('../Includes/head.php');
    include('../Acoes/publcar.php');
    if(empty($_SESSION['loggedin'])){
        $_SESSION['loggedin'] = "Usuário não Logado";
        header("Location: login.php");      
    }

    if (isset($_GET['id'])){
        $acao = "Editar";
    } else {
        $acao = "Publicar";
    }
?>
<body class="container bg-light">
    <div class="container bg-white">
        <header>
            <img src="../Images/Header/header.jpg" style="width: 100%;" alt="Sistema de Comentários">
        </header>
        <nav>
            <div class="col-md-12 mt-3 text-right">               
                <small>Olá: <b><?=$_SESSION['loggedin']?></b>
                <a name="btnSair" class="ml-2" href="../Acoes/logout.php"><img src="../Images/Icones/sair.png" title="Sair" alt="Sair"></a> </small>                                
            </div>
        </nav>
        <form action="./index.php" method="POST">
            <input type="hidden" id="acao" name="acao" value="<?=$acao?>">
            <div class="row">
            <?php 
                if (($_SESSION['loggedin'] == "Usuário não Logado")){
                    echo '<div class="d-none">';
                }
            ?>
            <h2 class="text-info text-left p-3">Deixe seu Comentário</h2>
                <div class="col-md-9">
                    <div class="form-group">
                        <textarea class="form-control form-control-sm" name="comentario" rows="4" placeholder="Escreva seu comentário" inputmode="text"></textarea>
                    </div>
                </div>
                <div class="col-md-3 p-3">
                    <div class="form-group">
                        <input name="btnPublicar" class="btn btn-info" type="submit" value="Publicar">
                        <input class="btn btn-outline-info" type="reset" value="Limpar">           
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="anonimo" id="anonimo">
                        <label class="form-check-label" for="anonimo">Comentar Anônimo</label>
                    </div>
                </div>
            </div>
        </form>
        <?php 
             if (($_SESSION['loggedin'] == "Usuário não Logado")){
                echo '</div>';
             }
        ?>
            <div class="row">
                <h2 class="text-info text-left p-3">Comentários</h2>
                <div class="col-md-12 mt-1">
                    <?php include('../Includes/comentarios.php'); ?>            
                </div>
            </div>
    </div>
</body>
<?php include('../Includes/footer.php')?>
