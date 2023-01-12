<?php
session_start();




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

<body>
    <h1 class="text-center">REGISTRATION FORM</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <?php 
                        if(isset($_SESSION['error'])){
                            echo '<div class="mb-3 alert alert-danger">' . $_SESSION["error"] . '</div>';
                            unset($_SESSION['error']);
                        }
                        ?>              
                        <form action='server/registeruser.php' method='POST'>
                            <div class="form-group mb-3">
                                <label for="username">Username</label>
                                <input id="username" name="username" type="text" class="form-control" >        
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input id="password" name="password" type="password" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="confirmPassword"> Confirm Password</label>
                                <input id="confirmPassword" name="confirmPassword" type="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                            <span>
                                Already Have An Account?
                                <a href="login.php">Login </a>
                            </span>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>