<?php
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";

    $filename = $_GET['f-name'];
    $myfile = $filename.".txt";

    $filename = "Files 1/".$filename;
    $newfile = fopen("$filename.txt", "w");

    $txt = $_GET['f-content'];
    fwrite($newfile, $txt);

    $readfile = fopen("$filename.txt", "r");
    echo fgets($readfile);
    fclose($newfile);
?>