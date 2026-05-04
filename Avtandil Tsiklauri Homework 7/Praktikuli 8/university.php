<?php
    $connect = mysqli_connect("localhost", "root", "", "university");

    $select_query = "SELECT * FROM students";
    $result = mysqli_query($connect, $select_query);
    $data = mysqli_fetch_all($result);
?>

<?php
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $delete_query = "DELETE FROM students WHERE id = $id";
        mysqli_query($connect, $delete_query);
        header("location: university.php");
    }
?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        if(isset($_POST['name'])){
            $name = $_POST['name'];
            $age = $_POST['age'];
            $date = date("Y-m-d H:i:s");

            $update = "UPDATE students SET name='$name', age='$age', updated_at='$date' WHERE id = $id";

            mysqli_query($connect, $update);
            header("location: university.php");
        }

        $select_one = "SELECT * FROM students WHERE id = $id";
        $res_one = mysqli_query($connect, $select_one);
        $row = mysqli_fetch_assoc($res_one);
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
        <h3>Edit Student</h3>
        Name: <input type="text" name="name" value="<?= $row['name'] ?>"><br><br>
        Age: <input type="number" name="age" value="<?= $row['age'] ?>"><br><br>
        <button>Edit</button>
    </form>

<?php
    }
?>

<hr><hr>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Updated_at</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

<?php foreach($data as $row){ ?>
    <tr>
        <td><?= $row[0] ?></td>
        <td><?= $row[1] ?></td>
        <td><?= $row[2] ?></td>
        <td><?= $row[3] ?></td>
        <td><a href="?id=<?= $row[0] ?>">edit</a></td>
        <td><a href="?delete=<?= $row[0] ?>">delete</a></td>
    </tr>
<?php } ?>

</table>
</body>
</html>