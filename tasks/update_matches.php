<?php
require __DIR__ . "/../config/db.php"; // conecta ao banco

$date = date("Y");
$url = "https://api.football-data.org/v4/competitions/BSA/matches?season=$date";

$headers = [
    "X-Auth-Token: dc0a3d62c43648c98fcf431d56040fec"
];

$curl = curl_init($url);

curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => $headers
]);

$response = curl_exec($curl);
curl_close($curl);

$data = json_decode($response, true);

if (!isset($data["matches"])) {
    die("Erro ao buscar dados da API.");
}

$matches = $data["matches"];

foreach ($matches as $m) {
    $match_id  = $m["id"];
    $round     = $m["matchday"];
    $homeTeam  = $m["homeTeam"]["name"];
    $awayTeam  = $m["awayTeam"]["name"];
    $dateGame  = date("Y-m-d H:i:s", strtotime($m["utcDate"]));
    $status    = $m["status"];

    $sql = $conn->prepare("
        INSERT INTO games (match_id, round, homeTeam, awayTeam, date, status)
        VALUES (?, ?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE
            round = VALUES(round),
            date = VALUES(date),
            status = VALUES(status)
    ");

    $sql->bind_param(
        "iissss",
        $match_id,
        $round,
        $homeTeam,
        $awayTeam,
        $dateGame,
        $status
    );

    $sql->execute();
}

echo "Atualização concluída!";
