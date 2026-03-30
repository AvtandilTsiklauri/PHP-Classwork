<?php
    echo "<pre>";
    print_r($_GET);
    echo "</pre>";

    $filename = $_GET['f-name'];
    $myfile = $filename.".txt";
    $filename = "files/".$filename;
    fopen("$filename.txt", "w");
?>