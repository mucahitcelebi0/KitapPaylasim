<?php
$servername = "localhost";
$username = "root"; // XAMPP kullanıyorsanız, genelde kullanıcı adı "root" ve şifre boş olur.
$password = "";
$dbname = "kitappaylasimdb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Bağlantı başarısız: " . $e->getMessage();
}

