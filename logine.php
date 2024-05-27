<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="logine.css">
</head>
<body>
    <div class="container">
        <div class="form-container login-form">
            <h2>Connexion</h2>
            <form action="login_process.php" method="post">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
                <button type="submit" name="login-submit">Se Connecter</button>
            </form>
            <p>Pas encore de compte ? <a href="registre.php">Inscrivez-vous</a></p>
        </div>
    </div>
</body>
</html>
