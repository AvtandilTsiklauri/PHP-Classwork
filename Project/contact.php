<?php
    session_start();
    include "includes/connect.php";

    $name_err = "";
    $email_err = "";
    $message_err = "";
    $success = "";

    if(isset($_POST['send'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $error = false;

        if(empty($name)){
            $name_err = "Name Is Required";
            $error = true;
        }

        if(empty($email) || strpos($email, "@") === false){
            $email_err = "Enter Valid Email";
            $error = true;
        }

        if(empty($message)){
            $message_err = "Message Is Required";
            $error = true;
        }

        if(!$error){
            $insert = "INSERT INTO contacts (name, email, message)
                       VALUES('$name', '$email', '$message')";
            mysqli_query($connect, $insert);
            $success = "Message Sent Successfully!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact — GamingPortal</title>
    <link rel="stylesheet" href="css/registration.css">
</head>
<body>

<form method="post">

    <h2>Contact Us</h2>

    <?php if($success){ ?>
        <p class="success"><?php echo $success; ?></p>
    <?php } ?>

    <label>Name:</label>
    <input type="text" name="name">
    <?php if($name_err){ ?>
        <p class="error"><?php echo $name_err; ?></p>
    <?php } ?>

    <br>

    <label>Email:</label>
    <input type="text" name="email">
    <?php if($email_err){ ?>
        <p class="error"><?php echo $email_err; ?></p>
    <?php } ?>

    <br>

    <label>Message:</label>
    <textarea name="message" style="width:100%; height:120px; padding:10px; border:1px solid #ccc; border-radius:6px; font-family:Arial; font-size:14px; outline:none; box-sizing:border-box; resize:vertical;"></textarea>
    <?php if($message_err){ ?>
        <p class="error"><?php echo $message_err; ?></p>
    <?php } ?>

    <br>

    <button name="send">Send Message</button>

    <br><br>

    <p style="text-align:center;">
        <a href="index.php">← Back To Home</a>
    </p>

</form>

</body>
</html>