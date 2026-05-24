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

    if(isset($_POST['add_comment'])){
        $comment = $_POST['comment'];
        $user_id = $_SESSION['user_id'];

        if(!empty($comment)){
            $insert = "INSERT INTO comments (comment, post_id, user_id)
                       VALUES('$comment', '$id', '$user_id')";
            mysqli_query($connect, $insert);
            header("location: post.php?id=$id");
        }
    }

    if(isset($_GET['delete_comment'])){
        $comment_id = $_GET['delete_comment'];
        $delete = "DELETE FROM comments WHERE id='$comment_id' AND user_id='".$_SESSION['user_id']."'";
        mysqli_query($connect, $delete);
        header("location: post.php?id=$id");
    }

    $comments_query = "SELECT comments.*, users.username 
                       FROM comments 
                       JOIN users ON comments.user_id = users.id
                       WHERE comments.post_id = '$id'
                       ORDER BY comments.id DESC";
    $comments_result = mysqli_query($connect, $comments_query);
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

<div class="post-container">

    <img src="uploads/<?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>">

    <div class="post-full">
        <a href="category.php?id=<?php echo $post['category_id']; ?>" class="category"><?php echo $post['category_name']; ?></a>
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

    <div class="comments-section">

        <h3>Comments</h3>

        <?php if(mysqli_num_rows($comments_result) > 0){ ?>
            <?php while($comment = mysqli_fetch_assoc($comments_result)){ ?>
            <div class="comment-box">
                <div class="comment-header">
                    <div class="comment-pfp"><?php echo strtoupper($comment['username'][0]); ?></div>
                    <p class="comment-author"><?php echo $comment['username']; ?></p>
                    <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] == $comment['user_id']){ ?>
                        <div class="comment-actions">
                            <a href="post.php?id=<?php echo $id; ?>&delete_comment=<?php echo $comment['id']; ?>" onclick="return confirm('Delete this comment?')">Delete</a>
                        </div>
                    <?php } ?>
                </div>
                <p class="comment-text"><?php echo $comment['comment']; ?></p>
            </div>
            <?php } ?>
        <?php } else { ?>
            <p class="no-comments">No comments yet. Be the first!</p>
        <?php } ?>

        <?php if(isset($_SESSION['user_id'])){ ?>
            <form method="post">
                <textarea name="comment" placeholder="Write a comment..."></textarea>
                <button name="add_comment">Post Comment</button>
            </form>
        <?php } else { ?>
            <p class="login-to-comment">
                <a href="login.php">Login</a> to leave a comment.
            </p>
        <?php } ?>

    </div>

</div>
    <footer>
        <p>GamingPortal © 2025 — <a href="contact.php">Contact Us</a></p>
    </footer>
</body>
</html>