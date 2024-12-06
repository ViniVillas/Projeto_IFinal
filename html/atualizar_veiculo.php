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
$id = $_POST['id'];
$nome = $_POST['nome'];
$ano = $_POST['ano'];
$quilometragem = $_POST['quilometragem'];
$preco = $_POST['preco'];

// Atualizar dados no banco de dados
$sql = "UPDATE veiculos SET nome = '$nome', ano = '$ano', quilometragem = '$quilometragem', preco = '$preco' WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Veículo atualizado com sucesso!";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>
