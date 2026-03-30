<?php
    $folder = "files2";

    if(!file_exists($folder)) {
        mkdir($folder);
    }

    file_put_contents($folder . "/file1.txt", "This Is File 1");
    file_put_contents($folder . "/file2.txt", "This Is File 2");
    file_put_contents($folder . "/file3.txt", "This Is File 3");

    $files = scandir($folder);

    for($i = 2; $i < count($files); $i++) {
        echo $files[$i] . "<br>";
    }
?>