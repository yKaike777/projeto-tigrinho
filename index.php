<?php 
    session_start();

    if(!isset($_SESSION['user_id'])) {
        header("Location: login.html");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Tigrinho</title>
</head>
<body>
    <h1>Bem-Vindo ao [SITE DE APOSTAS]. O melhor site de apostas do Oeste!</h1>
    <a href="brasileirao.php">Ver Jogos do Brasileirao</a>
    <a href="auth/logout.php">Sair</a>
</body>
</html>