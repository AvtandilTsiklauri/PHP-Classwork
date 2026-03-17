<!DOCTYPE html>
<html>

<head>
<style>

body{
    text-align:center;
    font-family: Arial;
}

.container{
    width: fit-content;
    margin:20px auto;
}

input{
    padding:5px;
    margin:5px;
}

.error{
    color:red;
}

.success{
    color:green;
}

</style>
</head>

<body>

<div class="container">

<h2>Enter 5-Digit Code</h2>

<form method="post">

<input type="text" name="user_code" placeholder="Enter 5 digits">

<br>

<input type="submit" name="submit" value="Check">

</form>

<?php

if(isset($_POST['submit'])){

    $user = $_POST['user_code'];
    $error = false;

    if(empty($user)){
        echo "<p class='error'>Code is required!</p>";
        $error = true;
    }

    elseif(!is_numeric($user)){
        echo "<p class='error'>Only numbers allowed!</p>";
        $error = true;
    }

    elseif(strlen($user) != 5){
        echo "<p class='error'>Code must be exactly 5 digits!</p>";
        $error = true;
    }

    if(!$error){

        $real = rand(10000,99999);

        if($user == $real){
            echo "<p class='success'>Correct Code</p>";
        }
        else{
            echo "<p class='error'>Wrong! The code was: $real</p>";
        }

    }

}

?>

</div>

</body>
</html>