<?php
session_start();
require 'conexao.php';

//CRIAR USUÁRIO
if (isset($_POST['create_usuario'])){
    $nome= mysqli_real_escape_string($conn, trim($_POST['nome']));
    $email= mysqli_real_escape_string($conn, trim($_POST['email']));
    $whatsapp= mysqli_real_escape_string($conn, trim($_POST['whatsapp']));
    $ferramentas= mysqli_real_escape_string($conn, trim($_POST['ferramentas']));
    $tarefas= mysqli_real_escape_string($conn, trim($_POST['tarefas']));
    $atividade= mysqli_real_escape_string($conn, trim($_POST['atividade']));
    $data_tarefa= mysqli_real_escape_string($conn, trim($_POST['data_tarefa']));

    $sql = "INSERT INTO usuarios (nome, email, whatsapp, ferramentas, tarefas, atividade, data_tarefa) VALUES ('$nome','$email','$whatsapp','$ferramentas','$tarefas','$atividade','$data_tarefa')";




    mysqli_query($conn, $sql);
    


    if (mysqli_affected_rows($conn)>0){
        $_SESSION['mensagem'] = 'Usuário criado com sucesso!';
        header('location: index.php');
        exit;
    } else{
        $_SESSION['mensagem'] = 'Usuário não foi criado!';
        header('location: index.php');
        exit;
    }
}


//EDITAR USUÁRIO
if (isset($_POST['update_usuario'])){
    $usuario_id = mysqli_real_escape_string($conn, $_POST['usuario_id']);

    $nome= mysqli_real_escape_string($conn, trim($_POST['nome']));
    $email= mysqli_real_escape_string($conn, trim($_POST['email']));
    $whatsapp= mysqli_real_escape_string($conn, trim($_POST['whatsapp']));
    $ferramentas= mysqli_real_escape_string($conn, trim($_POST['ferramentas']));
    $tarefas= mysqli_real_escape_string($conn, trim($_POST['tarefas']));
    $atividade= mysqli_real_escape_string($conn, trim($_POST['atividade']));
    $data_tarefa= mysqli_real_escape_string($conn, trim($_POST['data_tarefa']));

         $sql = "UPDATE usuarios SET 
                    nome = '$nome', 
                    email = '$email', 
                    whatsapp = '$whatsapp', 
                    ferramentas = '$ferramentas', 
                    tarefas = '$tarefas', 
                    atividade = '$atividade', 
                    data_tarefa = '$data_tarefa' 
                 WHERE id = '$usuario_id'";



    mysqli_query($conn, $sql);
    


    if (mysqli_affected_rows($conn)>0){
        $_SESSION['mensagem'] = 'Usuário atualizado com sucesso!';
        header('location: index.php');
        exit;
    } else{
        $_SESSION['mensagem'] = 'Usuário não foi atualizado!';
        header('location: index.php');
        exit;
    }
}

//EXCLUIR USUÁRIO
if (isset($_POST['delete_usuario'])) {
    $usuario_id = mysqli_real_escape_string($conn, $_POST['delete_usuario']);

    $sql = "DELETE FROM usuarios WHERE id = '$usuario_id'";
    $query = mysqli_query($conn, $sql); // Executa a consulta

    if (mysqli_affected_rows($conn) > 0) { // Verifica linhas afetadas
        $_SESSION['mensagem'] = 'Usuário deletado com sucesso!';
        header('location: index.php');
        exit;
    } else {
        $_SESSION['mensagem'] = 'Usuário não deletado!';
        header('location: index.php');
        exit;
    }
}
?>