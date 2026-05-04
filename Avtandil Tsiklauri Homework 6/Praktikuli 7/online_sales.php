<?php
    $connect = mysqli_connect("localhost","root", "", "online_sales");

    $select_quary = "SELECT * FROM products";
    $result = mysqli_query($connect, $select_quary);
    $data = mysqli_fetch_all($result);

    if(isset($_POST['name']) && !empty($_POST['name'])) {
        $name = $_POST['name'];
        $price = $_POST['price'];

        $insert = "INSERT INTO products(name, price) VALUES ('$name', '$price')";
        mysqli_query($connect, $insert);

        header("location: online_sales.php");
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
        Price: <input type="number" name="price"><br><br>

        <button>Add Product</button>
    </form>

    <hr>


    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
        </tr>
    

   <?php foreach($data as $row){ ?>
        <tr>
            <td><?= $row[0] ?></td>
            <td><?= $row[1] ?></td>
            <td><?= $row[2] ?></td>
        </tr>
    <?php } ?>
    </table>
</body>
</html>