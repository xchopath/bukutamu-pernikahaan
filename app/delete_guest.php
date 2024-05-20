<?php
	require 'db.php';

	$id = $_GET['id'];

	$statement = $pdo->prepare('DELETE FROM guests WHERE id = :id');
	$statement->execute([':id' => $id]);

	header('Location: index.php');
	exit;
?>
