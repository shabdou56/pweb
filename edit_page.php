
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
$conn2 = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn2->connect_error) {
    die("Connexion échouée : " . $conn2->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    
    $sql = "SELECT cat_id, description, etat FROM tasks WHERE id='$id'";
    $result = $conn2->query($sql);
    $row2 = $result->fetch_assoc();
    $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
          die("Connexion échouée : " . $conn->connect_error);
                }
      $user_id = $_SESSION['user_id'];
      $sql = "SELECT id,name FROM cat WHERE user_id=$user_id";
      $result = $conn->query($sql);
    echo '<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>To-Do List</title>
    <link rel="stylesheet" href="edit.css" />
  </head>
  <body>
    <div class="container">
      <div class="title-container">
        <h1>Edit Task</h1>
        <img src="empty.svg" class="empty-image" alt="empty" />
      </div>
      <form action="edit_process.php" method="post">';
      echo "<input type='hidden' name='id' value='" . $id . "'>";
      echo '
        <div class="form-control">
          <label><h4>Task ID :</h4></label>
          <p class="task-edit-id"> <h5>';
      echo  $id;
      echo '</h5></p> </div>';
          echo '<div class="form-control">
                <label for="category" ><div class="cat"> <h4>filter :</h4></div></label>
                <select id="category" name="category">';
                
                    if ($result->num_rows > 0) {
    
                          while($row = $result->fetch_assoc()) {
                           echo '<option value="'.$row['id']."\"";
                          if((isset($row2['cat_id']) && ($row['id']==$row2['cat_id']))) echo 'selected ="selected"';
                          echo '>';
                          echo $row['name'].'</option>';
                              }
                            }

                echo '</select></div>';
        echo '<div class="form-control">
          <label for="description"><h4>Description :</h4></label>
          <textarea rows="1" style="width: 100%" name="description">';
      echo $row2['description'];
      echo '</textarea>
        </div>
        <div class="form-control">
          <label for="etat"><h4>completed :</h4></label>
          <input
            type="checkbox"
            name="etat"
            class="custom-checkbox"';
            if($row2['etat']){echo 'checked';}
            echo ' />
        </div>
        <button type ="submit" class="editButton">Edit</button>
      </form>
      <button onclick="myFunc()">Go Back</button>
       <script> 
        function myFunc() { 
            window.location.href = "Web.php"; 
        } 
    </script> 
    </div>
  </body>
</html>
';  
}

$conn2->close();


?>