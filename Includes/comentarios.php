<?php
    $crud = new classCrud();
    $result = $crud->selectDB('*', 'comentarios', 'ORDER BY id desc', array());               
            while ($fetch = $result->fetch(PDO::FETCH_OBJ)) {
                $usuario = $crud->selectDB('imagem', 'usuarios', "WHERE usuario ='{$fetch->usuario}'", array())->fetch(PDO::FETCH_OBJ);       
                ?>
        <div class="card mb-2">
        <div class="row no-gutters">
        <div class="col-md-2">
            <img class="img-thumbnail rounded-circle" style="width: 200px; height: 130px;" alt="Usuário" src="../Images/Usuarios/<?php if (!empty($usuario)) {echo $usuario->imagem;} else {echo 'anonimo.jpg';}?>"/>
        </div>
        <div class="col-md-10">
            <div class="card-body p-2">
                <span class="float-right text-muted"><?=date('d/m/Y H:i', $fetch->data_criacao)?></span>
                <h5 class="card-title mb-0 font-weight-normal"><?=$fetch->id?> - <?=$fetch->usuario?></h5>
                <p class="card-subtitle mb-1 text-muted"><small><?=$fetch->email?></small></p>
                <p class="card-text font-weight-light"><?=$fetch->comentario?></p>
                <p class="card-text"><small class="text-muted"><?php if(!empty($fetch->data_edicao)) {echo "Editado: " . date('d/m/Y H:i', $fetch->data_edicao);}?></small>
                <?php 
                    if (($_SESSION['loggedin'] == "Usuário não Logado")){
                        echo '<div class="d-none">';
                    }
                ?>
                <span class="float-right mr-2"><a href='<?php echo "../Acoes/deletar.php?id={$fetch->id}&user={$fetch->usuario}"?>'><img src="../Images/Icones/deletar.png" title="Deletar" alt="Deletar"></a></span>
                <span class="float-right mr-3"><a href='<?php echo "../Pages/index.php?id={$fetch->id}&user={$fetch->usuario}"?>'><img src="../Images/Icones/editar.png" title="Editar" alt="Editar"></a></span></span>
                </p>
                <?php 
                    if (($_SESSION['loggedin'] == "Usuário não Logado")){
                     echo '</div>';
                    }
                     ?>
            </div>
        </div>
        </div>
        </div>   
<?php
    }
?>