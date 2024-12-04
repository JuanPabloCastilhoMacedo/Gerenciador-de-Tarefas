<?php
    session_start();
    require 'conexao.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-hearder">
                        <h4>Editar Usuário
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <?php 
                        if(isset($_GET['id'])){
                            $usuario_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $sql = "SELECT * FROM usuarios WHERE id='$usuario_id'";
                            $query = mysqli_query($conn, $sql);

                            if(mysqli_num_rows($query) > 0){
                                $usuario = mysqli_fetch_array($query);
                    ?>
                        <form action="acoes.php" method="POST">
                            <input type="hidden" name="usuario_id" value="<?=$usuario_id?>">
                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome" value="<?=$usuario['nome']?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="email" value="<?=$usuario['email']?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Whatsapp</label>
                                <input type="text" name="whatsapp" value="<?=$usuario['whatsapp']?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Ferramentas</label>
                                <input type="text" name="ferramentas" value="<?=$usuario['ferramentas']?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Tarefas</label>
                                <input type="text" name="tarefas" value="<?=$usuario['tarefas']?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Atividade</label>
                                <input type="text" name="atividade" value="<?=$usuario['atividade']?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Data da Tarefa</label>
                                <input type="date" name="data_tarefa" value="<?=$usuario['data_tarefa']?>" class="form-control">
                            </div>

                            <div class="mb3">
                                <button type="submit" name="update_usuario" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                        <?php
                        } else{
                            echo "<h5>Usuário não encontrado</h5>";
                        }
                    }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

