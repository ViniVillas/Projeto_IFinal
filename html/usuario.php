<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Veículo</title>
</head>
<body>
    <form method="post" action="add_veiculo.php">
        <fieldset>
            <legend>Registrar Novo Veículo</legend>
            <label>Nome: </label>
            <input type="text" name="nome" required><br>
            <label>Ano: </label>
            <input type="number" name="ano" required><br>
            <label>Quilometragem: </label>
            <input type="number" name="quilometragem" required><br>
            <label>Preço: </label>
            <input type="number" step="0.01" name="preco" required><br>
            <input type="submit" value="Adicionar Veículo">
        </fieldset>
    </form>
</body>
</html>
