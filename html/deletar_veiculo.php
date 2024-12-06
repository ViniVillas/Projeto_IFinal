<?php
session_start();
if (!isset($_SESSION['login']) || !isset($_SESSION['senha'])) {
    header('location: usuario.php');
    exit();
}

// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "a3motors";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Capturar o ID do veículo a ser removido
$id = $_GET['id'];

// Deletar o veículo do banco de dados
$sql = "DELETE FROM veiculos WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Veículo deletado com sucesso!";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>
