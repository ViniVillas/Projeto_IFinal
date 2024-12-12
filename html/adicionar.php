<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'proj';

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $ano = $_POST["ano"];
    $quilometros = $_POST["quilometros"];
    $preco = $_POST["preco"];

    $sql = "INSERT INTO veiculos (nome, ano, quilometros, preco) VALUES ('$nome', '$ano', '$quilometros', '$preco')";

    if (mysqli_query($conn, $sql)) {
        header("Location: estoque.php");
    } else {
        echo "Erro ao adicionar veículo: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Veículo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Adicionar Veículo</h1>
        <form action="" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
            <label for="ano">Ano:</label>
            <input type="number" id="ano" name="ano" required>
            <label for="quilometros">Quilômetros:</label>
            <input type="number" id="quilometros" name="quilometros" required>
            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" step="0.01" required>
            <button type="submit">Adicionar</button>
        </form>
        <a href="estoque.php"><button>Voltar</button></a>
    </div>
</body>
</html>
