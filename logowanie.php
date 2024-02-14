<?php
$dsn = "mysql:host=localhost;dbname=Dane_db";
$username = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    $stmt = $pdo->prepare("SELECT hasło FROM dane WHERE login=:login");
    $stmt->bindParam(':login', $login);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row) {
        if (password_verify($haslo, $row['hasło'])) {
            echo "<script>alert('Logowanie udane!');</script>";
            echo "<script>window.location.href = 'komentarze.php';</script>"; // Przekierowanie na stronę komentarzy po zalogowaniu
        } else {
            echo "<script>alert('Błędne hasło!');</script>";
            echo "<script>window.location.href = 'index.php';</script>"; // Przekierowanie na stronę główną po nieudanym logowaniu
        }
    } else {
        echo "<script>alert('Błędny login!');</script>";
        echo "<script>window.location.href = 'index.php';</script>"; // Przekierowanie na stronę główną po nieudanym logowaniu
    }
} catch (PDOException $e) {
    echo "Błąd połączenia: " . $e->getMessage();
}
?>
