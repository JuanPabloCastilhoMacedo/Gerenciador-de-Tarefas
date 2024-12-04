<!-- 
define('HOST', '127.0.0.1');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'gerenciador-de-tarefas');
$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('não foi possível conectar'); -->

<?php
$host = '127.0.0.1'; // ou 'localhost'
$user = 'root';
$password = ''; // Se o MySQL não tiver senha, deixe vazio
$dbname = 'gerenciador-de-tarefas';

// Criando a conexão
$conn = new mysqli($host, $user, $password, $dbname);

// Verificando erros de conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
