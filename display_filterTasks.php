<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todolist";

session_start();
if (!isset($_SESSION['user_id'])) {
   // header("Location: logine.php");
    exit();
}
// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $category =null;
     $user_id = $_SESSION['user_id'];
    if (isset($_POST['category']) && !empty($_POST['category'])) {
        $category = $_POST['category'];
    } 
if($category ===null || $category==='ALL'){
    $sql = "SELECT id, description, etat FROM tasks WHERE user_id='$user_id'";
}
else if($category =='COMPLETED'){
    $sql = "SELECT id, description, etat FROM tasks WHERE user_id='$user_id' AND etat=1";

}
else if($category =='PENDING'){
    $sql = "SELECT id, description, etat FROM tasks WHERE user_id='$user_id' AND etat=0";

}
else{
    $sql = "SELECT id, description, etat FROM tasks WHERE user_id='$user_id' and cat_id =$category";

}

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
   
}


?>
