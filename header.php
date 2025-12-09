<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="src/css/<?php echo $css?>.css">
    <link rel="stylesheet" href="src/css/header.css">
    <link rel="stylesheet" href="src/css/footer.css">
    <title><?php echo $title?></title>
</head>
<body>
    <header class="site-header">
        <div class="logo">Tigrinho</div>

        <nav class="nav">
            <a href="index.php">Início</a>
            <a href="brasileirao.php">Ver Jogos</a>
            <a href="brasileirao.php">Brasileirão</a>
            <a href="carteira.php">Ver Carteira</a>
        </nav>

        <div class="user-area">
            <span class="greeting">Olá, <?php echo isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Usuário'; ?></span>
            <a href="auth/logout.php" class="link-sair">Sair</a>
        </div>
    </header>