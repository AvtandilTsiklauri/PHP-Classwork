<?php
    $file = "files/data.txt";

    if(file_exists($file)) {
        echo "File Already Exists!";
    } 
    else {
        $fid = fopen($file, "w");
        fwrite($fid, "New File Created");
        fclose($fid);

        echo "File Created!";
    }
?>