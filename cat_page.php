<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>To-Do List</title>
    <link rel="stylesheet" href="cat.css" />
  </head>
  <body>
    <div class="container">
      <div class="title-container">
        <h1>Categories Manager</h1>
        <img src="empty.svg" class="empty-image" alt="empty" />
      </div>
      <div class="add_cat">
        <form action="add_cat.php" method="post">
          <input
            type="text"
            name="name"
            placeholder="New Category"
            maxlength="20"
            required
          />
          <button type="submit">Add</button>
        </form>
      </div>
      <ul>
        <!-- Les tâches seront affichées ici -->
        <?php include('cat-display.php'); ?>
      </ul>
       <button  onclick="myFunc()" class ="prev" >Go Back</button>
       <script> 
        function myFunc() { 
            window.location.href = "Web.php"; 
        } 
               </script> 

    </div>
  </body>
</html>
