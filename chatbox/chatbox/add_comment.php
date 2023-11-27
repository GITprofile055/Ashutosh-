<?php
include('config.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = mysqli_real_escape_string($con, $_POST['post_id']);
    $comment = mysqli_real_escape_string($con, $_POST['comment']);
    $admin_id = $_SESSION['user_id'];

    $query = "INSERT INTO comments (post_id, comment, admin_id) VALUES ('$post_id', '$comment', '$admin_id')";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location:add_comment.php?post_id=".$post_id);
        exit();
    } else {
        echo "An error occured. Please try again.";
    }
} else {
    echo "Invalid request.";
}

mysqli_close($con);
?>