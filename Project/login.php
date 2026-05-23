<?php
    session_start();
    include "includes/connect.php";

    $username_err = "";
    $password_err = "";
    $login_err = "";

    if(isset($_POST['login'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $error = false;

        if(empty($username)){
            $username_err = "Username Is Required";
            $error = true;
        }

        if(empty($password)){
            $password_err = "Password Is Required";
            $error = true;
        }

        if(!$error){

            $query = "SELECT * FROM users 
            WHERE username='$username' 
            AND password='$password'";

            $result = mysqli_query($connect, $query);

            if(mysqli_num_rows($result) == 1){

                $row = mysqli_fetch_assoc($result);

                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['role'] = $row['role'];

                header("location: index.php");

            } else {
                $login_err = "Invalid Username Or Password";
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

    <?php if($login_err){ ?>
        <p class="error"><?php echo $login_err; ?></p>
    <?php } ?>

    Username:
    <input type="text" name="username">
    <?php if($username_err){ ?>
        <p class="error"><?php echo $username_err; ?></p>
    <?php } ?>

    <br>

    Password:
    <input type="password" name="password">
    <?php if($password_err){ ?>
        <p class="error"><?php echo $password_err; ?></p>
    <?php } ?>

    <br>

    <button name="login">Login</button>

    <br><br>

    <p style="text-align:center;">
        Don't have an account?
        <a href="register.php">Register</a>
    </p>

</form>

</body>
</html>