<?php
session_start();
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todolist";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}
// Récupérer les données du formulaire
$username = $_POST['username'];
$password = $_POST['password'];

// Vérification des informations dans la base de données
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: Web.php");
        exit();
    } else {
        echo "Mot de passe incorrect";
    }
} else {
    echo "Nom d'utilisateur incorrect";
}
$stmt->close();
$conn->close();
?>
