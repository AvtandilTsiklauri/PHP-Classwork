<!DOCTYPE html>
<html>
<body>

<form method="post">
Enter X:
<input type="number" name="x">
<input type="submit" name="submit">
</form>

<?php

for($i=0;$i<4;$i++){
    for($j=0;$j<4;$j++){
        $matrix[$i][$j] = rand(10,100);
    }
}

echo "<h3>Matrix</h3>";
echo "<table border='1'>";

for($i=0;$i<4;$i++){
    echo "<tr>";
    for($j=0;$j<4;$j++){
        echo "<td>".$matrix[$i][$j]."</td>";
    }
    echo "</tr>";
}

echo "</table>";

echo "<h3>Above Main Diagonal</h3>";
echo "<table border='1'>";

for($i=0;$i<4;$i++){
    echo "<tr>";
    for($j=0;$j<4;$j++){

        if($j>$i){
            echo "<td>".$matrix[$i][$j]."</td>";
        }

    }
    echo "</tr>";
}

echo "</table>";

$sum = 0;
$product = 1;
$max = $matrix[0][0];
$min = $matrix[0][0];

foreach($matrix as $row){
    foreach($row as $num){

        $sum += $num;
        $product *= $num;

        if($num > $max) $max = $num;
        if($num < $min) $min = $num;

    }
}

$avg = $sum / 16;
$range = $max - $min;

echo "<h3>Statistics</h3>";
echo "Sum: $sum <br>";
echo "Product: $product <br>";
echo "Average: $avg <br>";
echo "Range: $range <br>";

if(isset($_POST['submit'])){

    $x = $_POST['x'];

    echo "<h3>Multiples of $x</h3>";

    foreach($matrix as $row){
        foreach($row as $num){

            if($num % $x == 0){
                echo $num." ";
            }

        }
    }

}

echo "<h3>Digit Sums</h3>";
echo "<table border='1'>";

for($i=0;$i<4;$i++){
    echo "<tr>";

    for($j=0;$j<4;$j++){

        $num = $matrix[$i][$j];
        $digitsum = array_sum(str_split($num));

        echo "<td>$digitsum</td>";

    }

    echo "</tr>";
}

echo "</table>";

?>

</body>
</html>