<?php
    require 'conexao.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visualizar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">

  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-hearder">
                        <h4>Visualizar Usuário
                            <a href="index.php" class="btn btn-danger float-end"><i class="bi bi-arrow-return-left"></i>&nbsp;Voltar</a>
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

                            <div class="mb-3">
                                <label>Nome</label>
                              <p class="form-control">
                              <?=$usuario['nome'];?>
                              </p>
                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <p class="form-control">
                                <?=$usuario['email'];?>
                                </p>
                            </div>

                            <div class="mb-3">
                                <label>Whatsapp</label>
                                <p class="form-control">
                                <?=$usuario['whatsapp'];?>
                                </p>
                            </div>

                            <div class="mb-3">
                                <label>Ferramentas</label>
                                <p class="form-control">
                                <?=$usuario['ferramentas'];?>
                                </p>
                            </div>

                            <div class="mb-3">
                                <label>Tarefas</label>
                                <p class="form-control">
                                <?=$usuario['tarefas'];?>
                                </p>
                            </div>

                            <div class="mb-3">
                                <label>Atividade</label>
                                <p class="form-control">
                                <?=$usuario['atividade'];?>
                                </p>
                            </div>

                            <div class="mb-3">
                                <label>Data da Tarefa</label>
                                <p class="form-control">
                                <?=date('d/m/Y', strtotime($usuario['data_tarefa']));?>
                                </p>
                            </div>







                            <div class="mb-3">
    <label>Data da Tarefa</label>
    <?php
    // Calcula a diferença em dias entre a data atual e a data da tarefa
    $dataAtual = new DateTime();
    $dataTarefa = new DateTime($usuario['data_tarefa']);
    $diferenca = $dataTarefa->diff($dataAtual)->days;
    $isFuture = $dataAtual < $dataTarefa;

    // Define a classe da cor com base na diferença
    if ($isFuture && $diferenca >= 6) {
        $classeCor = 'table-success'; // Verde
    } elseif ($isFuture && $diferenca < 5 && $diferenca >= 1) {
        $classeCor = 'table-warning'; // Amarelo
    } elseif ($dataAtual->format('Y-m-d') === $dataTarefa->format('Y-m-d') || !$isFuture) {
        $classeCor = 'table-danger'; // Vermelho
    } else {
        $classeCor = 'table-warning'; // Sem cor
    }
    ?>
    <table class="table <?= $classeCor; ?>">
        <tr>
            <td><?= date('d/m/Y', strtotime($usuario['data_tarefa'])); ?></td>
        </tr>
    </table>
</div>














                            <?php
                                }else{
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

