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

// Capturar os dados do formulário
$nome = $_POST['nome'];
$ano = $_POST['ano'];
$quilometragem = $_POST['quilometragem'];
$preco = $_POST['preco'];

// Inserir dados no banco de dados
$sql = "INSERT INTO veiculos (nome, ano, quilometragem, preco) VALUES ('$nome', '$ano', '$quilometragem', '$preco')";

if ($conn->query($sql) === TRUE) {
    echo "Novo veículo registrado com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
