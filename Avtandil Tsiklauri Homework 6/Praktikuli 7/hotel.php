<?php
    $connect = mysqli_connect("localhost", "root", "", "hotel_booking");

    $select_query = "SELECT * FROM guests";
    $result = mysqli_query($connect, $select_query);
    $data = mysqli_fetch_all($result);

    if(isset($_POST['name']) && !empty($_POST['name'])){
        $name = $_POST['name'];

        $insert = "INSERT into guests (name) values('$name')";
        mysqli_query($connect, $insert);
        header("location: hotel.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        Name: <input type="text" name="name"><br><br>

        <button>Insert Info</button>
    </form>

    <hr>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>

    <?php foreach($data as $row){ ?>
        <tr>
            <td><?= $row[0] ?></td>
            <td><?= $row[1] ?></td>
        </tr>
    <?php } ?>
    </table>
</body>
</html>