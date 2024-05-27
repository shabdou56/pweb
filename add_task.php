<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: logine.php");
    exit();
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todolist";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $description = $_POST["description"];
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("INSERT INTO tasks (description, etat, date_creation, user_id) VALUES (?, 0, NOW(),?)");
    $stmt->bind_param("si", $description, $user_id); // Notez le "si" pour string et integer

    if ($stmt->execute()) {
        header("Location: Web.php");
    } else {
        echo "Erreur : " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
