<?php
    $file = "files/log.txt";

    $fid = fopen($file, "a");

    $date = date("Y-m-d");
    $time = date("H:i:s");

    $text = $date . " " . $time . " - User visited\n";

    fwrite($fid, $text);
    fclose($fid);

    $fid = fopen($file, "r");

    while(!feof($fid)) {
        echo fgets($fid) . "<br>";
    }

    fclose($fid);
?>