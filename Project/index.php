<?php
    session_start();
    include "includes/connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gaming Portal</title>
    <link rel="stylesheet" href="css/frontpage.css">
</head>
<body>

<nav>
    <div class="nav-logo">GamingPortal</div>
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

    <div class="posts-grid">

        <?php
            $query = "SELECT posts.*, users.username, categories.name as category_name 
                      FROM posts 
                      JOIN users ON posts.user_id = users.id
                      JOIN categories ON posts.category_id = categories.id
                      ORDER BY posts.id DESC";

            $result = mysqli_query($connect, $query);

            while($post = mysqli_fetch_assoc($result)){
        ?>

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

    </div>
</div>

</body>
</html>