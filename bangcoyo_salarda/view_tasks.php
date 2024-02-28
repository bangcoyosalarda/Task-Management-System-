<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color:  #FFC0CB;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 90vh;
        }
        .container {
            text-align: center;
            background-color: #FFF8DC;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 0.8s ease;
        }
        h1 {
            color: #FFA500;
            font-weight: bold;
        }
        p {
            color: #000;
            margin-bottom: 10px;
        }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #FF1493;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #FF1493;
        }
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
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
