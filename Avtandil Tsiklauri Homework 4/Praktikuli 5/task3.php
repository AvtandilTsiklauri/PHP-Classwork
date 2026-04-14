<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 3</title>
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
        <form method="post">
            <h3>Create TXT File</h3>
            <input type="text" name="filename" placeholder="file name">
            <br><br>
            <button name="create">Create</button>
        </form>


        <form method="post">
            <h3>Write to File</h3>
            <input type="text" name="file" placeholder="file name (example.txt)">
            <br><br>
            <textarea name="text" placeholder="write text"></textarea>
            <br><br>
            <button name="write">Write</button>
        </form>

    <div class="files">
        <h3>Files:</h3>

        <?php
            $folder = "texts/";
            $files = scandir($folder);
            for($i = 2; $i < count($files); $i++){
            echo "<b>".$files[$i]."</b><br>";

    
            $lines = file($folder . $files[$i]);
            for($j = 0; $j < count($lines); $j++){
                echo $lines[$j] . "<br>";
            }

        echo "<a href='?delete=".$files[$i]."'>Delete</a><br><br>";
    }
    ?>

    <?php

        if(isset($_POST['create'])){
            $filename = $_POST['filename'] . ".txt";
            file_put_contents($folder . $filename, "");
        }

        if(isset($_POST['write'])){
            $file = $_POST['file'];
            $text = $_POST['text'];

            file_put_contents($folder . $file, $text . "\n", FILE_APPEND);
        }
        
        if(isset($_GET['delete'])){
            unlink($folder . $_GET['delete']);
            header("Location: Task3.php");
        }
?>
</div>
</body>
</html>