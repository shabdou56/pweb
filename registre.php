<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="logine.css">
</head>
<body>
    <div class="container">
        <div class="form-container register-form">
            <h2>Inscription</h2>
            <form action="register_process.php" method="post">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
                <button type="submit" name="register-submit">S'inscrire</button>
            </form>
            <p>Déjà un compte ? <a href="logine.php">Connectez-vous</a></p>
        </div>
    </div>
</body>
</html>
