<?php
$host = 'mysqldb';
$db = 'wedding';
$user = 'dbusr';
$pass = 'BuKuT4Mu_PwD';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

?>
