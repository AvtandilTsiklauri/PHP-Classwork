<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 2</title>
    <style>
        form{
            border: solid 1px black;
            width: 500px;
            padding: 20px;
            margin: 20px auto;
            background-color: antiquewhite;
        }
        .files{
            width: 500px;
            margin: auto;
        }
    </style>
</head>
<body>
    <form method="post" enctype="multipart/form-data"> 
    <input type="file" name="file">
    <br><br>
    <button name="send_button">Upload</button>
</form>

<div class="files">
    <h3>Uploaded Files:</h3>
       <?php
    $folder = "storage/";
    $files = scandir($folder);
    for($i = 2; $i < count($files); $i++){
        echo $files[$i] . " ";
        echo "<a href='".$folder.$files[$i]."' download>Download</a> ";
        echo "<a href='?delete=".$files[$i]."'>Delete</a><br>";
    }
    ?>
</div>

    <?php
        
        if(isset($_POST['send_button'])){
            $file_name = $_FILES['file']['name'];
            $file_tmp = $_FILES['file']['tmp_name'];
            $file_size = $_FILES['file']['size'];

            $max_size = 1024 * 1024 * 50;

        if($file_size <= $max_size){
            move_uploaded_file($file_tmp, $folder . $file_name);
            header("Location: Task2.php");
        } else {
            echo "File too large (max 50MB)<br>";
        }
}

        if(isset($_GET['delete'])){
            $file = $_GET['delete'];
            unlink($folder . $file);
            header("Location: Task2.php");
        }
    ?>
</body>
</html>