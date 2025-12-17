<?php 
    require '../config/db.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $balance = 0;

    $sql = "INSERT INTO users (username, email, password, balance) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssd", $username, $email, $password, $balance);

    if ($stmt->execute()) {
        header("Location: ../login.html");
        exit();
    } else{
        echo "Erro: " . $stmt->error;
    }
?>