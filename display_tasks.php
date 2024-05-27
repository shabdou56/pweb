<?php


if (!isset($_SESSION['user_id'])) {
    header("Location: logine.php");
    exit();
}

// Si le bouton de déconnexion est cliqué
if (isset($_POST['logout-submit'])) {
    // Détruire toutes les données de session
    session_unset();
    // Détruire la session
    session_destroy();
    // Rediriger vers la page de connexion
    header("Location: logine.php");
    exit(); // Arrêter l'exécution du script après la redirection
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
$sql = "SELECT id, description, etat FROM tasks WHERE user_id='$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<li" . ($row["etat"] ? " class='completed'" : "") . ">";
        echo  '<div class="task-desc">';
        echo $row["description"];
        echo '</div>';
        echo '<div class="task-actions">';
        echo "<form action='edit_page.php' method='post' style='display:inline;'>";
        echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
        echo "<button type='submit' class ='modify'>Edit</button>";
        echo "</form>";
        echo "<form action='delete_task.php' method='post' style='display:inline;'>";
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
