<?php 
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "tigrinho";

    $conn = new mysqli($host, $user, $password, $dbname);

    if ($conn->connect_error){
        die("Erro na Conexão" . $conn->connect_error);
    }
?>