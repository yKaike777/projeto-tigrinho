<?php
require __DIR__ . "/config/db.php";

    session_start();

    if(!isset($_SESSION['user_id'])) {
        header("Location: login.html");
        exit();
    }

$sql = "SELECT * FROM games ORDER BY date ASC";
$result = $conn->query($sql);
$matches = $result->fetch_all(MYSQLI_ASSOC);

    $title = "Brasileirão";
    $css = "brasileirao";
    include 'header.php';
?>



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

<?php include 'footer.php';?>