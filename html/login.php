<?php

$host = 'localhost';      
$username = 'root';     
$password = '';            
$dbname = 'proj';    


$conn = mysqli_connect($host, $username, $password, $dbname);


if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
    

?>




<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $username = $_POST["username"];
    $password = $_POST["password"];

   
    if (empty($username) || empty($password)) {
        $erro = "Por favor, preencha todos os campos!";
    } else {
      
        if ($username == "alex" && $password == "1020") {
          
            header("Location: estoque.php");
            exit;
        } else {
            
            $erro = "Usuário ou senha incorretos!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="php_style.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <?php if (isset($erro)) { ?>
            <div class="erro">
                <?php echo $erro; ?>
            </div>
        <?php } ?>
        <form action="" method="post">
            <label for="username">Usuário:</label>
            <input type="text" id="username" name="username" placeholder="Digite seu usuário" required>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" placeholder="Digite sua senha" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>

