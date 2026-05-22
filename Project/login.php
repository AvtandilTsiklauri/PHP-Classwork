<?php
    include "includes/connect.php";

    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $error = false;

        if(empty($username)){
            echo "Username Is Required <br>";
            $error = true;
        }

        if(empty($password)){
            echo "Password Is Required <br>";
            $error = true;
        }

        if(!$error){

            $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $result = mysqli_query($connect, $query);

            if(mysqli_num_rows($result) == 1){
                header("location: index.php");
            } else {
                echo "Invalid Username Or Password <br>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/registration.css">
</head>
<body>

<form method="post">

    <h2>Login</h2>

    Username:
    <input type="text" name="username">

    <br><br>

    Password:
    <input type="password" name="password">

    <br><br>

    <button name="login">Login</button>

    <br><br>

    <p style="text-align:center;">Don't have an account? <a href="register.php">Register</a></p>

</form>

</body>
</html>