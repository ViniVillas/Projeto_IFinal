<?php
// Conectar ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "a3motors";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consultar os dados dos veículos
$sql = "SELECT id, nome, ano, quilometragem, preco FROM veiculos";
$result = $conn->query($sql);
?>

<table border="1">
    <tr>
        <th>Nome</th>
        <th>Ano</th>
        <th>Quilometragem</th>
        <th>Preço</th>
        <th>Ação</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['nome'] . "</td>
                    <td>" . $row['ano'] . "</td>
                    <td>" . $row['quilometragem'] . "</td>
                    <td>" . number_format($row['preco'], 2, ',', '.') . "</td>
                    <td><a href='deletar_veiculo.php?id=" . $row['id'] . "'>Deletar</a></td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Nenhum veículo encontrado.</td></tr>";
    }
    ?>
</table>
