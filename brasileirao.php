<?php
require __DIR__ . "/config/db.php";

$sql = "SELECT * FROM games ORDER BY date ASC";
$result = $conn->query($sql);
$matches = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Jogos do Brasileirão</title>
</head>
<body>

<h1>Jogos do Brasileirão Série A</h1>

<ul>
<?php foreach ($matches as $m): ?>
    <li>
        <?= $m["homeTeam"] ?> vs <?= $m["awayTeam"] ?>
        - <?= $m["date"] ?>
        - Status: <?= $m["status"] ?>
    </li>
<?php endforeach; ?>
</ul>

<a href="index.php">Voltar</a>

</body>
</html>
