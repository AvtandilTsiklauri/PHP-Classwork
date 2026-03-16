<?php
    function f1(){
        echo "<h1>Hello Dear Students</h1>";
    }

    f1();
    f1();

    function f2($x, $y, $z = 9){
        return $x + $y - $z;
        return $x + $y + $z;
        return $x * $y * $z;
    }

    echo f2(10, 20);
?>