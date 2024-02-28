<?php session_start();
include ("config.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management System<</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>

  <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
}

.container-fluid {
    padding: 50px
}


.card {
    border: none;
    border-radius: 20px;
    box-shadow: 0 0 50px rgba(0, 0, 0, 0.1);
    background-color: #F5DEB3; 
}
.card-body {
        text-align: center;
        border: #000;
        font-size: 20px;
}

.card-title {
    margin-bottom: 20px;
    color: #FF1493;
    font-size: 30px;
    font-weight: bold;
    
} 


.btn {
    border-radius: 10px;
    transition: all 0.3s ease;
}

.btn-primary {
    background-color: #FF1493;
    border-color: #696969;
    box-shadow: #333;
    border-radius: 10px;
}

.btn-primary:hover {
    background-color: #8B0000;
    border-color: #F0E68C;
}

.btn-outline-primary {
    color: #8B4513;
    border-color: #8B4513;
}

.btn-outline-primary:hover {
    background-color: #8B4513;
    color: #F8F8FF;
}

.btn-outline-warning {
    color: #006400;
    border-color: #008000;
}

.btn-outline-warning:hover {
    background-color: #008000;
    color: #F8F8FF;
}

.btn-outline-danger {
    color: #696969;
    border-color: #000000;
}

.btn-outline-danger:hover {
    background-color: #696969;
    color: #F8F8FF;
}

/* Add Task Button */
.float-end {
    float: right;
}


.table thead th {
        background-color: #F5DEB3;
        color: #000;
    }

  </style>
  <body>

 <div class="container-fluid mt-4">
 <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tasks Information</h5>

              <a href="create_task.php" style="float: right;" class="btn btn-primary">Add Tasks</a>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th class="col">Id</th>
                    <th class="col">Title</th>
                    <th class="col">Description</th>
                    <th class="col">Priority</th>
                    <th class="col">Due Date</th>
                    
                  </tr>
                </thead>
                <tbody>


                <?php
                $query = "SELECT * FROM `tasks`";
                $query_run = mysqli_query($con, $query);
                if(mysqli_num_rows($query_run) > 0)
                {
                foreach($query_run as $row)
                {
                ?>
                    <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['title']; ?></td>
                <td><?= $row['description']; ?></td>
                <td><?= $row['priority']; ?></td>
                <td><?= $row['due_date']; ?></td>

                <td>

                <td><a type="button" class="btn btn-outline-primary" href="view_tasks.php?id=<?=$row['id'];?>">VIEW</a></td>
                <td><a type="button" class="btn btn-outline-warning" href="edit_task.php?id=<?=$row['id'];?>">EDIT</a></td>
                

                <form action="delete_task.php" method="POST">
                <input type="hidden" name="id" value="<?= $row['id']; ?>">
                <td><button type="submit" class="btn btn-outline-danger">DELETE</button></td>
                </form>
              </td>
                    </tr>

                    <?php
                } 
                } else
                {
                ?>
                <tr>
                <td colspan="6">No such Task</td>
                </tr>
                <?php
                }
                ?>

                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
 </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if (isset($_SESSION['status']) && $_SESSION['status_code'] != '' )
{
    ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
            });
        </script> 
        <?php
        unset($_SESSION['status']);
        unset($_SESSION['status_code']);
}
?>
  </body>
</html>