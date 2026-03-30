<?php
    $file = "files/test.txt";

    $fid = fopen($file, "w");
    fwrite($fid, "Hello World");
    fclose($fid);

    $fid = fopen($file, "r");
    $content = fread($fid, filesize($file));
    fclose($fid);

    echo $content
?>