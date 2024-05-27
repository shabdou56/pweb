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
$notValid = array("ALL", "COMPLETED", "PENDING");


// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    if(in_array(strtoupper($name),$notValid)){
        header("Location: cat_page.php");
    }
    else{
        $user_id = $_SESSION['user_id'];
        $stmt = $conn->prepare("INSERT INTO cat (name,user_id) VALUES ('$name','$user_id')");
    
        if ($stmt->execute()) {
            header("Location: cat_page.php");
        } else {
            echo "Erreur : " . $stmt->error;
        }
        $stmt->close();

    }
}
$conn->close();
?>
