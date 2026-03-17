<style>

body{
    text-align: center;
    font-family: Arial;
}

.container{
    width: fit-content;
    margin: 20px auto;
}

table{
    border-collapse: collapse;
    margin: 0 auto;
}

td{
    border:1px solid black;
    padding:8px;
    text-align:center;
}

h2{
    margin-bottom:15px;
}

</style>

<?php

function table(){

    echo "<div class='container'>";

    echo "<h2>10x10 Random Table</h2>";

    echo "<table>";

    for($i=0;$i<10;$i++){

        echo "<tr>";

        for($j=0;$j<10;$j++){

            $num = rand(10,99);
            echo "<td>$num</td>";

        }

        echo "</tr>";
    }

    echo "</table>";

    echo "</div>";
}

table();

?>