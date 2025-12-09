<?php 
    session_start();

    if(!isset($_SESSION['user_id'])) {
        header("Location: login.html");
        exit();
    }

    $title = "Home";
    $css = "index";
    include 'header.php';
?>

    <main>
        <div id="banner">
            <div id="button-container">
                <button onclick="window.location.href='brasileirao.php'" class="primary-btn">Fazer uma Aposta</button>
                <button onclick="window.location.href='brasileirao.php'" class="secondary-btn">Ver Jogos</button>
            </div>

            <div id="ver-carteira">
                <span id="saldo">R$ <?php echo $_SESSION['balance']?></span>
                <button class="add-btn">Adicionar Saldo</button>
                <a href="carteira.php">Ver Carteira</a>
            </div>
        </div>
    </main>

    <a href="auth/logout.php" class="link-sair">Sair</a>
    <?php include 'footer.php'?>