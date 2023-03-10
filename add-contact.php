<?php

    session_start();

    if (!isset($_SESSION['id'])) {
        header('location: login.php');
        return;
    }

    include 'server/dbconnect.php';
    

    if(isset($_POST['submit'])) {
        //store value to variable
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $type = $_POST['type'];

        //VALIDATION
        if($name == ''){
            $_SESSION['error'] = "Name must not be empty";
            header('location: add-contact.php');
            return;
        }
        if($email == ''){
            $_SESSION['error'] = "Email must not be empty";
            header('location: add-contact.php');
            return;
        }
        if($phone == ''){
            $_SESSION['error'] = "Phone must not be empty";
            header('location: add-contact.php');
            return;
        }
        //QUERY INSERT
        $sql = "INSERT INTO contacts (name, email, phone, type)
                VALUES ('$name', '$email', '$phone', '$type')";
        //run query
        if(!$conn->query($sql)) {
            $_SESSION['error'] = "Something went wrong";
            header('location: add-contact.php');
            return;
        }

        header("location: contacts.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <title>Document</title>
</head>

<body class="bg-dark">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php 
                    if(isset($_SESSION['error'])){
                        echo '<div class="mb-3 alert alert-danger mt-5">' . $_SESSION["error"] . '</div>';
                        unset($_SESSION['error']);
                    }
                ?>  
                <div class="card">
                    <div class="card-body">
                        <div class="mb-5">
                            <h1 class="text-center">
                                ADD NEW CONTACT
                            </h1>
                        </div>
                        <div class="mb-5 d-flex justify-content-between">
                            <a href="contacts.php" class="btn btn-md btn-primary">
                                Back to Contacts
                            </a>
                        </div>
                        <form method='POST'>
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input id="name" name="name" type="text" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone">Phone</label>
                                <input id="phone" name="phone" type="number" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="type">Select Type</label>
                                <select class="form-select" name="type" id="type">
                                    <option value="Home" >Home</option>
                                    <option value="Friend">Friend</option>
                                    <option value="Random">Random</option>
                                </select>
                            </div>
                            <div class="mb-3 d-grid">
                                <button type="submit" name="submit" class="btn btn-primary">ADD</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>