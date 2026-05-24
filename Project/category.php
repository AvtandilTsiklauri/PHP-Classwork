<?php
    session_start();
    include "includes/connect.php";

    $category_id = $_GET['id'];

    $category_query = "SELECT * FROM categories WHERE id='$category_id'";
    $category_result = mysqli_query($connect, $category_query);
    $category = mysqli_fetch_assoc($category_result);

    $posts_query = "SELECT posts.*, users.username, categories.name as category_name
                    FROM posts
                    JOIN users ON posts.user_id = users.id
                    JOIN categories ON posts.category_id = categories.id
                    WHERE posts.category_id = '$category_id'
                    ORDER BY posts.id DESC";
    $posts_result = mysqli_query($connect, $posts_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $category['name']; ?> — GamingPortal</title>
    <link rel="stylesheet" href="css/frontpage.css">
</head>
<body>

<nav>
    <a href="index.php" class="nav-logo">GamingPortal</a>
    <div class="nav-links">
        <?php if(isset($_SESSION['user_id'])){ ?>
            <?php if($_SESSION['role'] == 'admin'){ ?>
                <a href="admin/dashboard.php">Admin Dashboard</a>
            <?php } ?>
            <a href="admin/add_post.php">Add Post</a>
            <a href="logout.php">Logout</a>
            <div class="pfp"><?php echo strtoupper($_SESSION['username'][0]); ?></div>
        <?php } else { ?>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        <?php } ?>
    </div>
</nav>

<div class="container">

    <h2 class="category-title"><?php echo $category['name']; ?></h2>

    <div class="posts-grid">

        <?php if(mysqli_num_rows($posts_result) > 0){ ?>
            <?php while($post = mysqli_fetch_assoc($posts_result)){ ?>
            <div class="post-card">
                <img src="uploads/<?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>">
                <div class="post-info">
                    <span class="category"><?php echo $post['category_name']; ?></span>
                    <h3><?php echo $post['title']; ?></h3>
                    <p><?php echo substr($post['description'], 0, 100); ?>...</p>
                    <div class="post-meta">
                        By <strong><?php echo $post['username']; ?></strong>
                    </div>
                    <a href="post.php?id=<?php echo $post['id']; ?>" class="read-more">Read More</a>
                </div>
            </div>
            <?php } ?>
        <?php } else { ?>
            <p>No posts in this category yet.</p>
        <?php } ?>

    </div>
</div>

</body>
</html>