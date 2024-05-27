
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">

        <div class="toolBar">
            <div class="logout-container">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <button type="submit" name="logout-submit">logout</button>
                </form>
            </div>
             <div class="category-manager">
               
                <form action="cat_page.php" method="post">
                    <button type="submit">Categories Manager</button>
                  
                </form>
            </div>
        </div>
        <div class="title-container">
            <h1>Ma To-Do List</h1>
            <img src="empty.svg" class="empty-image" alt="empty">
        </div>

        <div class="add_task">
           
            <form action="add_task.php" method="post">
              
                <input  type="text" name="description" placeholder="New Task" required>
                <button type="submit">Add</button>
              
            </form>
        </div>
        <div class="fillter">
             <form action="display_filterTasks.php" method="post">
                <label for="category" ><div class="cat"> filter :</div></label>
                <select id="category" name="category">
                    <option value="ALL">ALL</option>
                    <option value="COMPLETED">COMPLETED</option>
                    <option value="PENDING">PENDING</option>
                   <?php include 'cat-display-select.php'; ?>
        <!-- Add more options as needed -->
                </select>
                <button type="submit">Submit</button>
                </form>
        </div>
       

        <ul >
            <!-- Les tâches seront affichées ici -->
            <?php include 'display_tasks.php'; ?>
              
        </ul>
       
    </div>
    
</body>
</html>
