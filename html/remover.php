<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'proj';

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

$id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "DELETE FROM veiculos WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: estoque.php");
    } else {
        echo "Erro ao remover veículo: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Remover Veículo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Remover Veículo</h1>
        <p>Tem certeza de que deseja remover este veículo?</p>
        <form action="" method="post">
            <button type="submit">Remover</button>
        </form>
        <a href="estoque.php"><button>Voltar</button></a>
    </div>
</body>
</html>
