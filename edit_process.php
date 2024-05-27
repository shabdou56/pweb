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

    $etat = isset($_POST["etat"])?1:0; // Assuming 'etat' is the name of the field you want to set
    $description = $_POST['description'];
    $category =null;
    if (isset($_POST['category']) && !empty($_POST['category'])) {
        $category = $_POST['category'];
    } 
    $stmt = $conn->prepare("UPDATE tasks SET description=?,etat = ?,cat_id=? WHERE id = ?");
    $stmt->bind_param("siii",$description, $etat,$category, $id); // 

    if ($stmt->execute()) {
       header("Location: Web.php");
    } else {
        echo "Erreur : " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();


?>

 


