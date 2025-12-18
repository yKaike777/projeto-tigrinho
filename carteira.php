<?php 
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

require 'config/db.php';

$title = "Carteira";
$css = "carteira";
include 'header.php';
?>

<main>
    <div id="saldo">
        <h1>R$<?php echo $_SESSION['balance']; ?></h1>

        <div id="button-group">
            <button type="button" class="add-btn" onclick="add_saldo()">Adicionar Saldo</button>
            <button type="button" class="saque-btn" onclick="sacar()">Sacar</button>
        </div>
    </div>
</main>

<div id="overlay"></div>

<div id="container">
    <div id="close-btn">X</div>
    <form action="balance.php" method="post">
        <div style="display: flex; flex-direction: column; width: 100%; gap: 20px;">
            <div>
                <label for="balance">Valor: </label>
                <input type="number" name="balance" id="balance" placeholder="Digite o Valor..." min="10" step=".1" required>
            </div>

            <div style="display: flex; justify-content: space-between;">
                <div style="display: flex; flex-direction: column; width: 45%;">
                    <label for="cpf">CPF: </label>
                    <input type="text" name="cpf" id="cpf" placeholder="Digite o CPF..." required>
                </div>

                <div style="display: flex; flex-direction: column; width: 45%;">
                    <label for="telefone">Telefone: </label>
                    <input type="text" name="telefone" id="telefone" placeholder="Digite o Telefone...">
                </div>
            </div>
        </div>

        <div id="button-container">
            <button type="submit" class="add-btn" id="confirm-btn" name="acao" value="add">Confirmar</button>
        </div>
    </form>
</div>

<script src="src/js/carteira.js"></script>
<?php include 'footer.php'; ?>
