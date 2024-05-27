<?php
session_start();
if (!isset($_SESSION['user_id'])) {
   // header("Location: logine.php");
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
$user_id = $_SESSION['user_id'];
// Récupérer les tâches de l'utilisateur connecté
$sql = "SELECT id,name FROM cat WHERE user_id=$user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo '<option value='.$row['id'].'>'.$row['name'].'</option>';
    }
} else {
    echo "Aucune tâche trouvée";
}
$conn->close();
?>
