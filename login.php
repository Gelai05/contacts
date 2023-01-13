<?php
session_start();

if (isset($_SESSION['id'])) {
    header('location: session.php');
    return;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <title>Group 1</title>
</head>

<body class="bg-dark">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-5">
                            <h1 class="text-center">
                                LOGIN PAGE
                            </h1>
                        </div>
                        <?php
                        if (isset($_SESSION['success'])) {
                            echo '<div class="mb-3 alert alert-success">' . $_SESSION["success"] . '</div>';
                            unset($_SESSION['success']);
                        }
                        if (isset($_SESSION['error'])) {
                            echo '<div class="mb-3 alert alert-danger">' . $_SESSION["error"] . '</div>';
                            unset($_SESSION['error']);
                        }
                        ?>
                        <form action='server/loginuser.php' method='POST'>
                            <div class="form-group mb-3">
                                <label for="username">Username</label>
                                <input id="username" name="username" type="text" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input id="password" name="password" type="password" class="form-control">
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                            <div class="text-center">
                                <span class="text-muted">
                                    Don't have an account?
                                    <a href="register.php" class="text-dark fw-bold">Register</a>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>