<?php 
    $file = "files/numbers.txt";

    $fid = fopen($file, "w");

    for($i = 0; $i < 10; $i++){
        $num = rand(1, 100);
        fwrite($fid, $num . "\n");
    }

    fclose($fid);

    $fid = fopen($file, "r");

    $sum = 0;

    while(!feof($fid)) {
        $line = fgets($fid);

        if($line != "") {
            echo $line . "<br>";
            $sum += (int)$line;
        }
    }

    fclose($fid);

    echo "<br>Sum = " . $sum;
?>