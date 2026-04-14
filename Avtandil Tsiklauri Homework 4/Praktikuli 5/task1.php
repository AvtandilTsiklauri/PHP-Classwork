<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 1</title>
     <style>
        form{
            border: solid 1px black;
            width: 500px;
            padding: 20px;
            margin: 20px auto;
            background-color: antiquewhite;
        }
    </style>
</head>
<body>
    
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file" accept=".png, .jpg, .gif">
        <br><br>
        <button name="send_button">Send File</button>
    </form>

    <?php
        if(isset($_POST['send_button'])){
            $file_name = $_FILES['file']['name'];
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_size = $_FILES['file']['size'];

            $extension = pathinfo($file_name, PATHINFO_EXTENSION);

            $max_size = 1024 * 1024 * 100;

             if(($extension == 'png' || $extension == 'jpg' || $extension == 'gif') && $file_size <= $max_size){
                move_uploaded_file($file_tmp, "uploads/" . $file_name);
                echo "File uploaded";
            } else {
                echo "Only png, jpg, gif allowed and max size 100MB";
            }
        }
    ?>
</body>
</html>