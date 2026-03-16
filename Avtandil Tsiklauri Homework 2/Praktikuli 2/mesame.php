<!DOCTYPE html>
<html>

<head>

<style>

table{
    border-collapse: collapse;
    margin:20px auto;
}

td{
    border:1px solid black;
    padding:8px;
    text-align:center;
    width:40px;
}

</style>

</head>

<body>

<h2 style="text-align:center;">6x5 Matrix</h2>

<table>

<?php

for($i=0;$i<6;$i++){

    echo "<tr>";

    for($j=0;$j<5;$j++){

        $matrix[$i][$j] = $i + $j;

        echo "<td>".$matrix[$i][$j]."</td>";

    }

    echo "</tr>";

}

?>

</table>

</body>
</html>