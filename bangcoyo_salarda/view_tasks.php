<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>

    <style>
       
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        session_start();
        include("config.php");

      
        if(isset($_GET['id'])) {
            $id = $_GET['id'];

     
            $query = "SELECT * FROM `tasks` WHERE `id` = $id";
            $query_run = mysqli_query($con, $query);

            if(mysqli_num_rows($query_run) > 0) {
                $row = mysqli_fetch_assoc($query_run);
               
                ?>
                <h1>Tasks Information</h1>
                <p><strong>ID:</strong> <?php echo $row['id']; ?></p>
                <p><strong>Title:</strong> <?php echo $row['title']; ?></p>
                <p><strong>Description:</strong> <?php echo $row['description']; ?></p>
                <p><strong>Priority:</strong> <?php echo $row['priority']; ?></p>
                <p><strong>Due Date:</strong> <?php echo $row['due_date']; ?></p>
                <a href="index.php" class="btn btn-primary">Back to Tasks List</a>
                <?php
            } else {
                echo "Task not found.";
                header("Location: index.php? msg=Successfully Deleted");
            }
        } else {
            echo "Invalid ID.";
        }
        ?>
    </div>
</body>
</html>
