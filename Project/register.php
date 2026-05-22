<?php
    include "includes/connect.php";

    if(isset($_POST['register'])){

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $country = $_POST['country'];
        $gender = $_POST['gender'];

        $error = false;

        if(empty($username)){
            echo "Username Is Required <br>";
            $error = true;
        }

        if(empty($email) || strpos($email, "@") === false){
            echo "Enter Valid Email <br>";
            $error = true;
        }

        if(strlen($password) < 5){
            echo "Password Must Be At Least 5 Characters <br>";
            $error = true;
        }

        if(empty($country)){
            echo "Choose Country <br>";
            $error = true;
        }

        if(empty($gender)){
            echo "Choose Gender <br>";
            $error = true;
        }

        if(!$error){

            $insert = "INSERT INTO users(username, email, password, country, gender, role)
            VALUES('$username', '$email', '$password', '$country', '$gender', 'user')";

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

    <br><br>

    Email:
    <input type="text" name="email">

    <br><br>

    Password:
    <input type="password" name="password">

    <br><br>

    Country:
    <select name="country">
        <option value="">Choose Country</option>
        <option value="Georgia">Georgia</option>
        <option value="USA">USA</option>
        <option value="Germany">Germany</option>
    </select>

    <br><br>

    Gender:
    <div class="gender">
        <label>
            <input type="radio" name="gender" value="Male"> Male
        </label>

        <label>
            <input type="radio" name="gender" value="Female"> Female
        </label>
    </div>

    <br><br>

    <button name="register">Register</button>

</form>

</body>
</html>