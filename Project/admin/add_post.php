<?php
    session_start();
    include "../includes/connect.php";

    if(!isset($_SESSION['user_id'])){
        header("location: ../login.php");
        exit();
    }

    $title_err = "";
    $description_err = "";
    $category_err = "";
    $image_err = "";

    $select_categories = "SELECT * FROM categories";
    $categories_result = mysqli_query($connect, $select_categories);
    $categories = mysqli_fetch_all($categories_result);

    if(isset($_POST['add_post'])){

        $title = $_POST['title'];
        $description = $_POST['description'];
        $category_id = $_POST['category_id'];
        $image = $_FILES['image'];

        $error = false;

        if(empty($title)){
            $title_err = "Title Is Required";
            $error = true;
        }

        if(empty($description)){
            $description_err = "Description Is Required";
            $error = true;
        }

        if(empty($category_id)){
            $category_err = "Choose Category";
            $error = true;
        }

        $allowed = ['jpg', 'png', 'jpeg'];
        $ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));

        if(!in_array($ext, $allowed)){
            $image_err = "Only JPG PNG JPEG Allowed";
            $error = true;
        }

        if(!$error){

            $folder = "../uploads/";
            move_uploaded_file($image['tmp_name'], $folder . $image['name']);

            $user_id = $_SESSION['user_id'];

            $insert = "INSERT INTO posts
            (title, description, image, category_id, user_id)
            VALUES(
            '$title', '$description', '".$image['name']."', '$category_id', '$user_id'
            )";

            mysqli_query($connect, $insert);

            header("location: ../index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
    <link rel="stylesheet" href="../css/addpost.css">
</head>
<body>
    <form method="post" enctype="multipart/form-data">

        <h2>Add Post</h2>

        Title:
        <input type="text" name="title">
        <?php if($title_err){ ?>
            <p class="error"><?php echo $title_err; ?></p>
        <?php } ?>

        <br>

        Description:
        <textarea name="description"></textarea>
        <?php if($description_err){ ?>
            <p class="error"><?php echo $description_err; ?></p>
        <?php } ?>

        <br>

        Category:
        <select name="category_id">
            <option value="">Choose Category</option>
            <?php foreach($categories as $cat){ ?>
            <option value="<?php echo $cat[0]; ?>">
                <?php echo $cat[1]; ?>
            </option>
            <?php } ?>
        </select>
        <?php if($category_err){ ?>
            <p class="error"><?php echo $category_err; ?></p>
        <?php } ?>

        <br>

        Image:
        <input type="file" name="image">
        <?php if($image_err){ ?>
            <p class="error"><?php echo $image_err; ?></p>
        <?php } ?>

        <br>

        <button name="add_post">Add Post</button>

    </form>

</body>
</html>