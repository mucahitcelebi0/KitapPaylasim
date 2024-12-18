<?php
include('db.php'); // Veritabanı bağlantısını dahil et

// Yorum verilerini al
$kitap_id = isset($_POST['kitap_id']) ? (int)$_POST['kitap_id'] : 0;
$kullanici_id = isset($_POST['kullanici_id']) ? (int)$_POST['kullanici_id'] : 0;
$yorum = isset($_POST['yorum']) ? trim($_POST['yorum']) : '';

if ($kitap_id > 0 && $kullanici_id > 0 && !empty($yorum)) {
    // Yorum ekleme sorgusu
    $query = "INSERT INTO yorumlar (kitap_id, kullanici_id, yorum, tarih) VALUES (:kitap_id, :kullanici_id, :yorum, NOW())";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':kitap_id', $kitap_id, PDO::PARAM_INT);
    $stmt->bindParam(':kullanici_id', $kullanici_id, PDO::PARAM_INT);
    $stmt->bindParam(':yorum', $yorum, PDO::PARAM_STR);
    $stmt->execute();

    echo "Yorum başarıyla eklendi.";
} else {
    echo "Tüm alanları doldurunuz.";
}
 