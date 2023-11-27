<?php
include('../add/header.php');
include('../add/config.php');




// Displays all the existing blogs
$query = "SELECT * FROM posts";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <h2 class="mb-4">Dashboard</h2>

        <div class="row">
            <div class="col-md-3">
                <!-- Sidebar -->
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">
                        Dashboard
                    </a>
                    <a href="#" class="list-group-item list-group-item-action ">Users</a>
                    <a href="#" class="list-group-item list-group-item-action">Posts</a>
                </div>
            </div>

            <div class="col-md-9">
                <!-- Content Area -->
                <div class="container mt-5">
                    <h2>Admin | Panel</h2>

                    <?php
                    if ($result && mysqli_num_rows($result) > 0) {
                        echo "<table class='table'>";
                        echo "<thead><tr><th scope='col'>Blog ID</th><th scope='col'>Blog Title</th><th scope='col'>Blog Author</th></tr></thead>";
                        echo "<tbody>";

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td><a href='comment.php?blog_id=" . $row['id'] . "'>" . $row['title'] . "</a></td>";

                            // Get the author's names
                            $author_id = $row['admin_id'];
                            $author_query = "SELECT name FROM users WHERE id = $author_id";
                            $author_result = mysqli_query($con, $author_query);

                            if ($author_result && mysqli_num_rows($author_result) > 0) {
                                $author_row = mysqli_fetch_assoc($author_result);
                                echo "<td>" . $author_row['name'] . "</td>";
                            } else {
                                echo "<td>Unknown</td>";
                            }

                            echo "</tr>";
                        }

                        echo "</tbody></table>";
                    } else {
                        echo "<p>No blogs available.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</body>

</html>

<?php
include('footer.php');
mysqli_close($con);
?>
