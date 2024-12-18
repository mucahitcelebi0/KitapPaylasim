<?php
include 'db.php';

$sql = "SELECT * FROM yorumlar";
$stmt = $conn->prepare($sql);
$stmt->execute();
$yorumlar = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($yorumlar);

