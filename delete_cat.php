<?php
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
    $id = $_POST["id"];
     $stmt = $conn->prepare("DELETE FROM cat WHERE id = ?");
    $stmt->bind_param("i", $id);
    
        if ($stmt->execute()) {
            header("Location: cat_page.php");
        } else {
            echo "Erreur : " . $stmt->error;
        }
        $stmt->close();
    
}
$conn->close();
?>
