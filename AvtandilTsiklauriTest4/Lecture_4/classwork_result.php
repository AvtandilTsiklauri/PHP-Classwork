<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="classwork.php">HOME</a>
    <div class="Result">
       <?php
            echo "<pre>";
            print_r($_GET);
            echo "</pre>";
        ?>
    </div>
</body>
</html>