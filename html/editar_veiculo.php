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

// Capturar o ID do veículo
$id = $_GET['id'];

// Buscar as informações do veículo
$sql = "SELECT * FROM veiculos WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<form method="post" action="atualizar_veiculo.php">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label>Nome: </label>
    <input type="text" name="nome" value="<?php echo $row['nome']; ?>" required><br>
    <label>Ano: </label>
    <input type="number" name="ano" value="<?php echo $row['ano']; ?>" required><br>
    <label>Quilometragem: </label>
    <input type="number" name="quilometragem" value="<?php echo $row['quilometragem']; ?>" required><br>
    <label>Preço: </label>
    <input type="number" step="0.01" name="preco" value="<?php echo $row['preco']; ?>" required><br>
    <input type="submit" value="Atualizar Veículo">
</form>

<?php $conn->close(); ?>
