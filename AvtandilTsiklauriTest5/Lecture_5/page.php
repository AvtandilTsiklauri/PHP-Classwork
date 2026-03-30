<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture 6</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="file.php" method="get">
        File Name - <input type="text" name="f-name">
        <br><br>
        <button>Create File</button>
    </form>
    <hr>
    <form action="file1.php" method="get">
        File Name - <input type="text" name="f-name">
        <br><br>
        File Content - <textarea name="f-content"></textarea>
        <br><br>
        <button>Write To File</button>
    </form>
    <hr>
    <div class="content">
        <h1>List of Files1</h1>
        <?php
            print_r(scandir("Files 1"));
        ?>
    </div>
</body>
</html>