<?php
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
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
// Vérifier si l'utilisateur existe déjà
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    echo "Cet utilisateur existe déjà";
} else {
    // Ajouter l'utilisateur dans la base de données
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);
    if ($stmt->execute()) { 

        header("Location: logine.php");
        echo "Inscription réussie";

    } else {
        echo "Erreur lors de l'inscription";
    }
}

$stmt->close();
$conn->close();
?>
