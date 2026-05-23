<?php
    session_start();
    include "../includes/connect.php";

    if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin'){
        header("location: ../index.php");
        exit();
    }

    $posts_count = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM posts"));
    $users_count = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM users"));

    $posts = mysqli_query($connect, "SELECT posts.*, users.username, categories.name as category_name 
                                     FROM posts 
                                     JOIN users ON posts.user_id = users.id
                                     JOIN categories ON posts.category_id = categories.id
                                     ORDER BY posts.id DESC");

    $users = mysqli_query($connect, "SELECT * FROM users ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>

<nav>
    <div class="nav-logo">GamingPortal — Admin</div>
    <div class="nav-links">
        <a href="../index.php">Back To Site</a>
        <a href="../logout.php">Logout</a>
        <div class="pfp"><?php echo strtoupper($_SESSION['username'][0]); ?></div>
    </div>
</nav>

<div class="container">

    <div class="stats">
        <div class="stat-box">
            <h2><?php echo $posts_count; ?></h2>
            <p>Total Posts</p>
        </div>
        <div class="stat-box">
            <h2><?php echo $users_count; ?></h2>
            <p>Total Users</p>
        </div>
    </div>

    <h3>All Posts</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Category</th>
            <th>Author</th>
            <th>Actions</th>
        </tr>
        <?php while($post = mysqli_fetch_assoc($posts)){ ?>
        <tr>
            <td><?php echo $post['id']; ?></td>
            <td><?php echo $post['title']; ?></td>
            <td><?php echo $post['category_name']; ?></td>
            <td><?php echo $post['username']; ?></td>
            <td>
                <a href="edit_post.php?id=<?php echo $post['id']; ?>">Edit</a>
                <a href="delete_post.php?id=<?php echo $post['id']; ?>" onclick="return confirm('Delete this post?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <h3>All Users</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Country</th>
            <th>Gender</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        <?php while($user = mysqli_fetch_assoc($users)){ ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['username']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['country']; ?></td>
            <td><?php echo $user['gender']; ?></td>
            <td><?php echo $user['role']; ?></td>
            <td>
                <?php if($user['username'] != 'AvtandilTsiklauri'){ ?>
                    <a href="delete_user.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Delete this user?')">Delete</a>
                <?php } else { ?>
                    —
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </table>

</div>

</body>
</html>