<?php
include 'db.php';

$eposta = $_POST['eposta'];
$sifre = $_POST['sifre'];

$sql = "SELECT * FROM kullanici WHERE eposta = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$eposta]);
$kullanici = $stmt->fetch();

if ($kullanici && password_verify($sifre, $kullanici['sifre'])) {
    session_start();
    $_SESSION['kullanici_id'] = $kullanici['id'];
    header("Location: profil.html");
} else {
    echo "Geçersiz e-posta veya şifre";
}

