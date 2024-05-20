<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $stmt = $pdo->prepare('UPDATE guests SET name = :name, email = :email, message = :message WHERE id = :id');
    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':message' => $message,
        ':id' => $id
    ]);

    header('Location: index.php');
    exit;
} else {
    $id = $_GET['id'];
    $stmt = $pdo->prepare('SELECT * FROM guests WHERE id = :id');
    $stmt->execute([':id' => $id]);
    $guest = $stmt->fetch();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Guest</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Edit Guest</h1>
        <form action="edit_guest.php" method="post" class="mt-4">
            <input type="hidden" name="id" value="<?php echo $guest['id']; ?>">
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($guest['name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($guest['email']); ?>">
            </div>
            <div class="form-group">
                <label for="message">Pesan:</label>
                <textarea id="message" name="message" rows="4" class="form-control"><?php echo htmlspecialchars($guest['message']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
