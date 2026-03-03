<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>შედეგი</title>
    <style>
        table {
            width: 500px;
            margin: auto;
            border-collapse: collapse;
        }
        td, th {
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>
<body>

<?php

if (isset($_GET['saxeli'])) {

    if ($_GET['tanamdeboba'] == "direqtori") {
        $xelfasi = 3000;
        $display = "დირექტორი";
    } elseif ($_GET['tanamdeboba'] == "menejeri") {
        $xelfasi = 2000;
        $display = "მენეჯერი";
    } elseif ($_GET['tanamdeboba'] == "bugaltert") {
        $xelfasi = 1700;
        $display = "ბუღალტერი";
    } elseif ($_GET['tanamdeboba'] == "programisti") {
        $xelfasi = 2500;
        $display = "პროგრამისტი";
    } elseif ($_GET['tanamdeboba'] == "dizaineri") {
        $xelfasi = 1800;
        $display = "დიზაინერი";
    } elseif ($_GET['tanamdeboba'] == "marketologi") {
        $xelfasi = 2100;
        $display = "მარკეტოლოგი";
    }

    $gadasaxadi = $xelfasi * ($_GET['percent'] / 100);
    $xelze_asagebi = $xelfasi - $gadasaxadi;

    echo "<h1 style='text-align:center;'>შედეგი</h1>";

    echo "<table style='width:80%; margin:auto; border:2px solid #333; border-collapse: collapse; text-align:center; font-family:Arial;'>";
    echo "<tr><th>მონაცემი</th><th>მნიშვნელობა</th></tr>";
    echo "<tr><td>სახელი</td><td>" . $_GET['saxeli'] . "</td></tr>";
    echo "<tr><td>გვარი</td><td>" . $_GET['gvari'] . "</td></tr>";
    echo "<tr><td>თანამდებობა</td><td>" . $display . "</td></tr>";
    echo "<tr><td>დარიცხული ხელფასი</td><td>" . $xelfasi . " ₾</td></tr>";
    echo "<tr><td>საშემოსავლო გადასახადი (" . $_GET['percent'] . "%)</td><td>" . $gadasaxadi . " ₾</td></tr>";
    echo "<tr><td>ხელზე ასაღები ხელფასი</td><td>" . $xelze_asagebi . " ₾</td></tr>";
    echo "</table>";
}

?>

</body>
</html>