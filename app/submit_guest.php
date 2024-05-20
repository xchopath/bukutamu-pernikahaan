<?php
require 'db.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $stmt = $pdo->prepare('INSERT INTO guests (name, email, message) VALUES (:name, :email, :message)');
        $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':message' => $message
        ]);

        header('Location: index.php');
        exit;
    }
?>
