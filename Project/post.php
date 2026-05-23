<?php
    session_start();
    include "includes/connect.php";

    $id = $_GET['id'];

    $query = "SELECT posts.*, users.username, categories.name as category_name 
              FROM posts 
              JOIN users ON posts.user_id = users.id
              JOIN categories ON posts.category_id = categories.id
              WHERE posts.id = '$id'";

    $result = mysqli_query($connect, $query);
    $post = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post['title']; ?></title>
    <link rel="stylesheet" href="css/frontpage.css">
</head>
<body>

<nav>
    <div class="nav-logo">GamingPortal</div>
    <div class="nav-links">
        <?php if(isset($_SESSION['user_id'])){ ?>
            <a href="admin/add_post.php">Add Post</a>
            <a href="logout.php">Logout</a>
            <div class="pfp"><?php echo strtoupper($_SESSION['username'][0]); ?></div>
        <?php } else { ?>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        <?php } ?>
    </div>
</nav>

<div class="post-container">

    <img src="uploads/<?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>">

    <div class="post-full">
        <span class="category"><?php echo $post['category_name']; ?></span>
        <h1><?php echo $post['title']; ?></h1>
        <p class="post-meta">By <strong><?php echo $post['username']; ?></strong></p>
        <p class="post-description"><?php echo $post['description']; ?></p>

        <div class="post-actions">
            <a href="index.php" class="back">← Back To Home</a>
            <?php if(isset($_SESSION['user_id'])){ ?>
                <a href="admin/edit_post.php?id=<?php echo $post['id']; ?>" class="read-more">Edit Post</a>
                <a href="admin/delete_post.php?id=<?php echo $post['id']; ?>" class="read-more" onclick="return confirm('Are you sure you want to delete this post?')">Delete Post</a>
            <?php } ?>
        </div>

    </div>

</div>

</body>
</html>