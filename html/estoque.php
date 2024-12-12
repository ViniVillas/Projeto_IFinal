<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'proj';

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

$sql = "SELECT * FROM veiculos";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Estoque</title>
    <link rel="stylesheet" href="php_style.css">
</head>
<body>
    <div class="container">
        <h1>Estoque de Veículos</h1>
        <?php if ($result->num_rows > 0) { ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ano</th>
                    <th>Quilômetros</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["nome"]; ?></td>
                        <td><?php echo $row["ano"]; ?></td>
                        <td><?php echo $row["quilometros"]; ?></td>
                        <td>R$ <?php echo number_format($row["preco"], 2, ',', '.'); ?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $row["id"]; ?>"><button>Editar</button></a>
                            <a href="remover.php?id=<?php echo $row["id"]; ?>"><button>Remover</button></a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p>Nenhum veículo encontrado.</p>
        <?php } ?>
        <a href="adicionar.php"><button>Adicionar Veículo</button></a>
    </div>
</body>
</html>
