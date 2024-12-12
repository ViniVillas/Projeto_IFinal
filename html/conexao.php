<?php

$host = 'localhost';      
$username = 'root';        
$password = '';            
$dbname = 'proj';  


$conn = mysqli_connect($host, $username, $password, $dbname);


if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
} else {
    echo "Conexão bem-sucedida ao banco de dados '$dbname'!";
}
?>
