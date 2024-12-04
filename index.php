<?php
    session_start();
    require 'conexao.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-4">
        <?php include('mensagem.php');?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-hearder text-center">
                        <h4>lista de usuários <i class="bi bi-people-fill"></i>&nbsp;
                        <a href="usuario-create.php" class="btn btn-primary float-end"><i class="bi bi-person-plus-fill"></i>&nbsp;adicionar usuário</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Whatsapp</th>
                                    <th>Ferramentas</th>
                                    <th>Tarefas</th>
                                    <th>Atividade</th>
                                    <th>Data da Tarefa</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $sql= 'SELECT * FROM usuarios';
                                    $usuarios= mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($usuarios) > 0){
                                        foreach($usuarios as $usuario){

                                            // Calcula a diferença em dias entre a data atual e a data da tarefa
                                            $dataAtual = new DateTime();
                                            $dataTarefa = new DateTime($usuario['data_tarefa']);
                                            $diferenca = (int)$dataAtual->diff($dataTarefa)->days;
                                            $isFuture = $dataAtual < $dataTarefa;

                                            // Define a classe da cor com base na diferença
                                            if ($isFuture && $diferenca >= 6) {
                                                $cor = 'table-success'; // Verde
                                            } elseif ($isFuture && $diferenca >= 0) {
                                                $cor = 'table-warning'; // Amarelo
                                            } elseif (!$isFuture || $diferenca === 0) {
                                                $cor = 'table-danger'; // Vermelho
                                            } else {
                                                $cor = ''; // Sem cor, caso necessário
                                            }

                                    
                                ?>
                                <tr>
                                    <td><?=$usuario['id']?></td>
                                    <td><?=$usuario['nome']?></td>
                                    <td><?=$usuario['email']?></td>
                                    <td><?=$usuario['whatsapp']?></td>
                                    <td><?=$usuario['ferramentas']?></td>
                                    <td><?=$usuario['tarefas']?></td>
                                    <td><?=$usuario['atividade']?></td>
                                    <td class="<?=$cor?>"><?=date('d/m/Y', strtotime($usuario['data_tarefa']))?></td>
                                    <td>
                                        <a href="usuario-view.php?id=<?=$usuario['id']?>" class="btn btn-secondary btn-sm"><span: class="bi bi-eye-fill"></span>&nbsp;Visualizar</a>
                                        <a href="usuario-edit.php?id=<?=$usuario['id']?>" class="btn btn-success btn-sm"><i class="bi bi-pencil-fill"></i>&nbsp;Editar</a>
                                        <form action="acoes.php" method="POST" class="d-inline">
                                            <button onclick="return confirm('Tem certeza que deseja excluir?')" type="submit" name="delete_usuario" value="<?=$usuario['id']?>" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i>&nbsp;Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                    }
                                    }
                                    else{
                                        echo '<h5>Nunhum usuário encontrado</h5>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

