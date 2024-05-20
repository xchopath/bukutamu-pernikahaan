<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu Pernikahan</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Buku Tamu Pernikahan</h1>
        <form action="submit_guest.php" method="post" class="mt-4">
            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="message">Pesan:</label>
                <textarea id="message" name="message" rows="4" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <h2 class="mt-5">Daftar Tamu</h2>
        <ul class="list-group mt-3">
        <?php
        require 'db.php';
        $stmt = $pdo->query('SELECT id, name, email, message, created_at FROM guests ORDER BY created_at DESC');
        while ($row = $stmt->fetch()) {
            echo '<li class="list-group-item">';
            echo '<strong>' . htmlspecialchars($row['name']) . '</strong> (' . htmlspecialchars($row['email']) . ')<br>';
            echo nl2br(htmlspecialchars($row['message'])) . '<br>';
            echo '<small class="text-muted">' . $row['created_at'] . '</small><br>';
            echo '<a href="edit_guest.php?id=' . $row['id'] . '" class="btn btn-warning btn-sm mt-2">Update</a> ';
            echo '<a href="delete_guest.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm mt-2" onclick="return confirm(\'Are you sure you want to delete this guest?\');">Delete</a>';
            echo '</li>';
        }
        ?>
        </ul>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
