<?php
session_start();    
include("config.php");

if(isset($_POST["insertButton"])){
    $title = $_POST["title"];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $due_date = $_POST['due_date'];

    $insert_query = "INSERT INTO `tasks`(`title`, `description`, `priority`, `due_date`) VALUES ('$title','$description','$priority','$due_date')";
    $insert_result = mysqli_query($con, $insert_query);

    if($insert_result){
        $_SESSION['status'] = "Successfully Submitted!";
        $_SESSION['status_code'] = "success";
        header("Location: index.php");
    } else {
        echo "Error";
    }
}

if(isset($_POST["updateButton"])){
    $id = $_POST["id"];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $due_date = $_POST['due_date'];

    $update_query = "UPDATE `tasks` SET `title`='$title',`description`='$description',`priority`='$priority',`due_date`='$due_date' WHERE `id` = '$id'";
    $update_result = mysqli_query($con, $update_query);

    if($update_result){
        $_SESSION['status'] = "Task Edited Successfully!";
        $_SESSION['status_code'] = "success";
        header("Location: index.php");
    } else {
        echo "Error";
    }
}
?>
