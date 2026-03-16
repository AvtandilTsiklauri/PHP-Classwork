<!DOCTYPE html>
<html>
<head>
<style>

table{
    border-collapse: collapse;
    margin-top:20px;
}

td{
    border:1px solid black;
    padding:8px;
    text-align:center;
}

.result{
    margin-top:20px;
    padding:15px;
    border:2px solid black;
    width:300px;
}

</style>
</head>

<body>

<form method="post">
    Enter X:
    <input type="number" name="x">
    <input type="submit" name="submit">
</form>

<?php

$numbers = array(12, 25, 34, 45, 56, 67, 78, 89, 91, 23, 54, 66);

if(isset($_POST['submit'])){

    $x = $_POST['x'];

    $less = 0;
    $more = 0;

    foreach($numbers as $n){

        if($n < $x){
            $less++;
        }

        if($n > $x){
            $more++;
        }

    }

    echo "<h3>Array Elements</h3>";

    echo "<table><tr>";

    foreach($numbers as $n){
        echo "<td>$n</td>";
    }

    echo "</tr></table>";

    echo "<div class='result'>";
    echo "X value: <b>$x</b><br><br>";
    echo "Numbers less than X: <b>$less</b><br>";
    echo "Numbers greater than X: <b>$more</b>";
    echo "</div>";

}

?>

</body>
</html>