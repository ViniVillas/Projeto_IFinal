<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'proj';

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM veiculos WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result && $result->num_rows > 0) {
        $vehicle = mysqli_fetch_assoc($result);
    } else {
        die("Veículo não encontrado.");
    }
} else {
    die("ID do veículo não fornecido.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $ano = $_POST["ano"];
    $quilometros = $_POST["quilometros"];
    $preco = $_POST["preco"];

    $sql = "UPDATE veiculos SET nome='$nome', ano='$ano', quilometros='$quilometros', preco='$preco' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        header("Location: estoque.php");
    } else {
        echo "Erro ao atualizar veículo: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Veículo</title>
    <link rel="stylesheet" href="php_style.css">
</head>
<body>
    <div class="container">
        <h1>Editar Veículo</h1>
        <form action="" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($vehicle['nome']); ?>" required>
            <label for="ano">Ano:</label>
            <input type="number" id="ano" name="ano" value="<?php echo htmlspecialchars($vehicle['ano']); ?>" required>
            <label for="quilometros">Quilômetros:</label>
            <input type="number" id="quilometros" name="quilometros" value="<?php echo htmlspecialchars($vehicle['quilometros']); ?>" required>
            <label for="preco">Preço:</label>
            <input type="number" id="preco" name="preco" step="0.01" value="<?php echo htmlspecialchars($vehicle['preco']); ?>" required>
            <button type="submit">Salvar</button>
        </form>
        <a href="estoque.php"><button>Voltar</button></a>
    </div>
</body>
</html>
