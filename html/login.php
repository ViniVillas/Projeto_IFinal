<?php
// session_start inicia a sessão
session_start();

// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['login'];
$senha = $_POST['senha'];

// Definindo as credenciais de login válidas
$usuario_valido = 'alex';
$senha_valida = '1234';

// Verificar se o login e a senha estão corretos
if ($login === $usuario_valido && $senha === $senha_valida) {
    // Iniciar a sessão do usuário
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;

    // Redireciona para a página 'document.php'
    header('location: document.php');
    exit(); // Certifique-se de que o script não continua executando após o redirecionamento
} else {
    // Caso o login ou a senha estejam errados, destruir a sessão e redirecionar para a página inicial
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    header('location: usuario.php');
    exit(); // Certifique-se de que o script não continua executando após o redirecionamento
}
?>
