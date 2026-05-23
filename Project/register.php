<?php
    include "includes/connect.php";

    $username_err = "";
    $email_err = "";
    $password_err = "";
    $country_err = "";
    $gender_err = "";

    if(isset($_POST['register'])){

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $country = $_POST['country'];
        $gender = $_POST['gender'] ?? "";

        $error = false;

        if(empty($username)){
            $username_err = "Username Is Required";
            $error = true;
        } else {
            $check = "SELECT * FROM users WHERE username='$username'";
            $check_result = mysqli_query($connect, $check);
            if(mysqli_num_rows($check_result) > 0){
                $username_err = "Username Already Exists";
                $error = true;
            }
        }

        if(empty($email) || strpos($email, "@") === false){
            $email_err = "Enter Valid Email";
            $error = true;
        }

        if(strlen($password) < 5){
            $password_err = "Password Must Be At Least 5 Characters";
            $error = true;
        }

        if(empty($country)){
            $country_err = "Choose Country";
            $error = true;
        }

        if(empty($gender)){
            $gender_err = "Choose Gender";
            $error = true;
        }

        if(!$error){

            $insert = "INSERT INTO users
            (username, email, password, country, gender, role)
            VALUES(
            '$username', '$email', '$password', '$country', '$gender', 'user'
            )";

            mysqli_query($connect, $insert);

            header("location: login.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/registration.css">
</head>
<body>

<form method="post">

    <h2>Register</h2>

    Username:
    <input type="text" name="username">
    <?php if($username_err){ ?>
        <p class="error"><?php echo $username_err; ?></p>
    <?php } ?>

    <br>

    Email:
    <input type="text" name="email">
    <?php if($email_err){ ?>
        <p class="error"><?php echo $email_err; ?></p>
    <?php } ?>

    <br>

    Password:
    <input type="password" name="password">
    <?php if($password_err){ ?>
        <p class="error"><?php echo $password_err; ?></p>
    <?php } ?>

    <br>

    Country:
    <select name="country">
        <option value="">Choose Country</option>
        <option value="Georgia">Georgia</option>
        <option value="USA">USA</option>
        <option value="Germany">Germany</option>
    </select>
    <?php if($country_err){ ?>
        <p class="error"><?php echo $country_err; ?></p>
    <?php } ?>

    <br>

    Gender:
    <div class="gender">
        <label>
            <input type="radio" name="gender" value="Male">
            Male
        </label>
        <label>
            <input type="radio" name="gender" value="Female">
            Female
        </label>
    </div>
    <?php if($gender_err){ ?>
        <p class="error"><?php echo $gender_err; ?></p>
    <?php } ?>

    <br>

    <button name="register">Register</button>

    <br><br>

    <p style="text-align:center;">
        Already have an account?
        <a href="login.php">Login</a>
    </p>

</form>

</body>
</html>