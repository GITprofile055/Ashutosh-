<?php
include('config.php');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blog_id = mysqli_real_escape_string($con, $_POST['blog_id']);
    $user_id = $_SESSION['user_id'];
    $comment_id = mysqli_real_escape_string($con, $_POST['comment_id']);
    $reply_content = mysqli_real_escape_string($con, $_POST['reply']);

    $insert_reply_query = "INSERT INTO likes (comment_id, author_id, reply) VALUES ('$comment_id', '$user_id', '$reply_content')";
    $result = mysqli_query($con, $insert_reply_query);

    if ($result) {
        header("Location:comment.php?blog_id=".$blog_id);
        exit();
    } else {
        echo "An error occured. Please try again.";
    }
} else {
    echo "Invalid request.";
}

mysqli_close($con);
?>