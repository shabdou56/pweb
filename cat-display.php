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
        echo "<li>";
        echo  '<div class="task-desc">';
        echo $row["name"];
        echo '</div>';
        echo '<div class="task-actions">';
        echo "<form action='delete_cat.php' method='post' style='display:inline;'>";
        echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
        echo "<button type='submit' class ='delete'>Delete</button>";
        echo "</form>";
        echo "</div>";
        echo "</li>";
    }
} else {
    echo "Aucune tâche trouvée";
}
$conn->close();
?>
