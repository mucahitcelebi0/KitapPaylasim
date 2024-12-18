<?php
include 'db.php';

$kullanici_adi = $_POST['kullanici_adi'];
$eposta = $_POST['eposta'];
$sifre = password_hash($_POST['sifre'], PASSWORD_BCRYPT);

$sql = "INSERT INTO kullanici (kullanici_adi, eposta, sifre) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$kullanici_adi, $eposta, $sifre]);

header("Location: giris.html");

