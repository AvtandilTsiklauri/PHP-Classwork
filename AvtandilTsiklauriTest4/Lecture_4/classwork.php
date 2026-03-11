<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <a href="classwork.php">HOME</a>
<form action="" method="post">
    <h1>PHP Form Validation Example</h1>
    <label for="">Name:</label>
    <input type="text" name="name" value="<?php if(isset($_POST["name"])) echo $_POST["name"]?>"> *
    <br><br>
    <label for="">Email:</label>
    <input type="text" name="email" value="<?php echo $_POST['email'] ?? ''; ?>"> *
    <br><br>
    <label for="">Website:</label>
    <input type="text" name="website">
    <br><br>
    <label for="">Comment:</label>
    <textarea name="comment"></textarea>
    <br><br>
    <label for="">Gender:</label>
    <input type="radio" name="gender" value="Female">Female
    <input type="radio" name="gender" value="Male">Male
    <input type="radio" name="gender" value="Other">Other *
    <br><br>

    <input type="submit" name="submit-form">  
</form>
     <div class="Result">
        <?php
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";

            if(isset($_POST['submit-form'])){
                echo "<h3>Clicked</h3>";
                if(empty($_POST['name'])){
                    echo "<p>Name is Empty!!!!</p>";
                }

                if(empty($_POST['email'])){
                    echo "<p>Email is Empty!!!!</p>";
                }
            }
        ?>
    </div>

    
</body>
</html>