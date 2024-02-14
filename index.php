<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formularz logowania i rejestracji</title>
</head>
<body>
    <form action="dodaj_do_bazy.php" method="post">
    <h2>Rejestracja</h2>
        <label for="login">Login:</label><br>
        <input type="text" id="login" name="login" required><br>
        <label for="haslo">Hasło:</label><br>
        <input type="password" id="haslo" name="haslo" required><br><br>
        <input type="submit" value="Zarejestruj" class="button">
    </form>

    <form action="logowanie.php" method="post">
    <h2>Logowanie</h2>
        <label for="login">Login:</label><br>
        <input type="text" id="login" name="login" required><br>
        <label for="haslo">Hasło:</label><br>
        <input type="password" id="haslo" name="haslo" required><br><br>
        <input type="submit" value="Zaloguj" class="button">
    </form>
</body>
</html>
