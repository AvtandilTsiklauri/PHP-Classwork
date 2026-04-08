<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="files[]" multiple>
        <br><br>
        <button name="send_button">Send File</button>
    </form>

    <?php

        if(isset($_POST['send_button']) && $_FILES) {

            $files = $_FILES['files'];

             for ($i = 0; $i < count($files['name']); $i++) {
                $tmpName = $files['tmp_name'][$i];
                $fileName = $files['name'][$i];

                if ($tmpName) {
                    move_uploaded_file($tmpName, "Storage/" . $fileName);
                }   
            }
        }

    ?>

</body>
</html>