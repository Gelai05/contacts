<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('location: login.php');
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
                                SESSION PAGE
                            </h1>
                        </div>
                        <div class="mb-3">
                            <h1 class="text-muted">
                                Welcome <span class="text-dark fw-bold"><?php echo $_SESSION['username']; ?></span>
                            </h1>
                        </div>
                        <div class="mb-3 d-grid">
                            <a href="contacts.php" class="btn btn-primary">
                                Manage Contact
                            </a>
                        </div>
                        <div class="mb-3 d-grid">
                            <a href="server/logout.php" class="btn btn-danger">
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>