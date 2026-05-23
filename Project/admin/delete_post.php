<?php
    session_start();
    include "../includes/connect.php";

    if(!isset($_SESSION['user_id'])){
        header("location: ../login.php");
        exit();
    }

    $id = $_GET['id'];

    $delete = "DELETE FROM posts WHERE id='$id'";
    mysqli_query($connect, $delete);

    header("location: ../index.php");
?>