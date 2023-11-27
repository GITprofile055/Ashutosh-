<?php
include('config.php');
include('header.php');


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if ($email == 'ashu' || $password == 'ashu') {
        session_start();
        $_SESSION['email'] = $email;
        header('location:adminindex.php');
    } else {
        echo "<script>alert('Email or password is incorrect.')</script>";
    }
}
?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="card col-md-5 m-auto mt-5">
        <div class="card-header">
            <h2 >Admin Login</h2>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control mb-3" placeholder="Enter your email"
                    required>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control mb-3"
                    placeholder="Enter your password" required>
                    <div class="text-center">
    <button type="submit" name="submit" class="btn btn-primary">Sign In</button>
</div>

            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>
<?php
include('footer.php');

?>