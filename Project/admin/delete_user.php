<?php
    session_start();
    include "../includes/connect.php";

    if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin'){
        header("location: ../index.php");
        exit();
    }

    $id = $_GET['id'];

    $delete = "DELETE FROM users WHERE id='$id'";
    mysqli_query($connect, $delete);

    header("location: dashboard.php");
?>