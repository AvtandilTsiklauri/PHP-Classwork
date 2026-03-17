<!DOCTYPE html>
<html>

<head>
<style>

body{
    text-align:center;
    font-family: Arial;
}

.container{
    width: fit-content;
    margin:20px auto;
}

table{
    border-collapse: collapse;
    margin: 0 auto;
}

td{
    border:1px solid black;
    padding:8px;
}

form{
    margin-top:20px;
}

input{
    margin:5px;
    padding:5px;
}

.error{
    color:red;
}

</style>
</head>

<body>

<h2>Generate MxN Table</h2>

<form method="post">

M: <input type="number" name="m" value="<?php echo isset($_POST['m']) ? $_POST['m'] : ''; ?>">
N: <input type="number" name="n" value="<?php echo isset($_POST['n']) ? $_POST['n'] : ''; ?>">
<br>

a: <input type="number" name="a" value="<?php echo isset($_POST['a']) ? $_POST['a'] : ''; ?>">
b: <input type="number" name="b" value="<?php echo isset($_POST['b']) ? $_POST['b'] : ''; ?>">
<br>

<input type="submit" name="submit" value="Generate">

</form>

<?php

function generateTable($m, $n, $a, $b){

    echo "<div class='container'>";
    echo "<table>";

    for($i=0;$i<$m;$i++){

        echo "<tr>";

        for($j=0;$j<$n;$j++){

            $num = rand($a,$b);
            echo "<td>$num</td>";

        }

        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";
}

if(isset($_POST['submit'])){

    $m = $_POST['m'];
    $n = $_POST['n'];
    $a = $_POST['a'];
    $b = $_POST['b'];

    $error = false;

    if(empty($m) || empty($n) || empty($a) || empty($b)){
        echo "<p class='error'>All fields are required!</p>";
        $error = true;
    }

    if($a > $b){
        echo "<p class='error'>a must be less than or equal to b!</p>";
        $error = true;
    }

    if(!$error){
        generateTable($m, $n, $a, $b);
    }

}

?>

</body>
</html>