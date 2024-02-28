<?php
session_start();
include("config.php");

$id = $_POST['id']; 

$query = "DELETE FROM tasks WHERE `id`='$id'";
$result = mysqli_query($con, $query);

if($result){
    $_SESSION['status'] = "Successfully Deleted";
    $_SESSION['status_code'] = "success";
    header("Location: index.php? msg=Successfully Deleted");

}else{
echo "Error";
}

?>