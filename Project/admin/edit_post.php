<?php
    session_start();
    include "../includes/connect.php";

    if(!isset($_SESSION['user_id'])){
        header("location: ../login.php");
        exit();
    }

    $id = $_GET['id'];

    $select_categories = "SELECT * FROM categories";
    $categories_result = mysqli_query($connect, $select_categories);
    $categories = mysqli_fetch_all($categories_result);

    $query = "SELECT * FROM posts WHERE id='$id'";
    $result = mysqli_query($connect, $query);
    $post = mysqli_fetch_assoc($result);

    $title_err = "";
    $description_err = "";
    $category_err = "";

    if(isset($_POST['edit_post'])){

        $title = $_POST['title'];
        $description = $_POST['description'];
        $category_id = $_POST['category_id'];

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

        if(!$error){

            $update = "UPDATE posts SET 
            title='$title', 
            description='$description', 
            category_id='$category_id'
            WHERE id='$id'";

            mysqli_query($connect, $update);

            header("location: ../index.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="../css/addpost.css">
</head>
<body>
    <form method="post">

        <h2>Edit Post</h2>

        <label>Title:</label>
        <input type="text" name="title" value="<?php echo $post['title']; ?>">
        <?php if($title_err){ ?>
            <p class="error"><?php echo $title_err; ?></p>
        <?php } ?>

        <br>

        <label>Description:</label>
        <textarea name="description"><?php echo $post['description']; ?></textarea>
        <?php if($description_err){ ?>
            <p class="error"><?php echo $description_err; ?></p>
        <?php } ?>

        <br>

        <label>Category:</label>
        <select name="category_id">
            <option value="">Choose Category</option>
            <?php foreach($categories as $cat){ ?>
            <option value="<?php echo $cat[0]; ?>" <?php if($cat[0] == $post['category_id']) echo 'selected'; ?>>
                <?php echo $cat[1]; ?>
            </option>
            <?php } ?>
        </select>
        <?php if($category_err){ ?>
            <p class="error"><?php echo $category_err; ?></p>
        <?php } ?>

        <br>

        <button name="edit_post">Save Changes</button>

    </form>

</body>
</html>