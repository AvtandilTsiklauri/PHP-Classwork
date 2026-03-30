<?php
    $text = $_GET['text'];
    if($text == ""){
        echo "Field Is Empty!";
        return;
    }

    $file = "files/user.txt";

    $fid = fopen($file, "w");
    fwrite($fid, $text);
    fclose($fid);

    $fid = fopen($file, "r");
    $content = fread($fid, filesize($file));
    fclose($fid);

    echo $content;
?>


