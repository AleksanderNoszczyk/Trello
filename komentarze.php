<?php
// Połączenie z bazą danych
$dsn = "mysql:host=localhost;dbname=dane_db";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obsługa dodawania komentarza
    if (isset($_POST['submit_comment'])) {
        $comment = $_POST['comment'];
        $stmt = $pdo->prepare("INSERT INTO komentarze (komentarz) VALUES (:comment)");
        $stmt->bindParam(':comment', $comment);
        $stmt->execute();
        header("Location: komentarze.php"); // Przekierowanie po dodaniu komentarza
        exit();
    }

    // Pobranie wszystkich komentarzy z bazy danych
    $stmt = $pdo->query("SELECT * FROM komentarze");
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Błąd połączenia: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komentarze</title>
    <link rel="stylesheet" href="komentarz.css">
</head>
<body>
    <form action="komentarze.php" method="post">
    <h2>Dodaj komentarz</h2>
        <textarea name="comment" rows="4" cols="50" required></textarea><br>
        <input type="submit" name="submit_comment" value="Dodaj komentarz" class="button">
    </form>
    <form>
    <h2>Komentarze</h2>
    <?php foreach ($comments as $comment): ?>
        <div>
            <p><?php echo $comment['komentarz']; ?></p>
        </div>
    <?php endforeach; ?>
    </form>
</body>
</html>
