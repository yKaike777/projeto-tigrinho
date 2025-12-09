<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

require 'config/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $acao = $_POST["acao"];
    $valor = floatval($_POST["balance"]);
    $user_id = $_SESSION['user_id'];

    if ($acao === "add") {

        $stmt = $conn->prepare("UPDATE users SET balance = balance + ? WHERE id = ?");
        $stmt->bind_param("di", $valor, $user_id);
        $stmt->execute();

    } elseif ($acao === "saque") {

        if ($valor > $_SESSION['balance']) {
            echo "Saldo insuficiente";
            exit();
        }

        $stmt = $conn->prepare("UPDATE users SET balance = balance - ? WHERE id = ?");
        $stmt->bind_param("di", $valor, $user_id);
        $stmt->execute();
    }

    $stmt = $conn->prepare("SELECT balance FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $res = $stmt->get_result();
    $user = $res->fetch_assoc();

    $_SESSION['balance'] = $user['balance'];

    header("Location: carteira.php");
    exit();
}
