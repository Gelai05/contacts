<?php

    session_start();
    include 'server/dbconnect.php';
    
    //GET FIRST THE ID
    $id = $_GET['id'];

    //SELECT FIRST THE CONTACT ID
    $sql = "SELECT * FROM contacts WHERE id='$id'";
    $result = $conn->query($sql);
    //Check if has data
    if($result->num_rows == 0) {
        header('location: contacts.php');
        return;
    }
    $contact = $result->fetch_assoc();


    // POST METHOD
    if(isset($_POST['submit'])) {
        //store value to variable
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

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
        $sql = "UPDATE contacts SET name='$name', email='$email', phone='$phone'
                WHERE id='$id'";
        //run query
        if(!$conn->query($sql)) {
            $_SESSION['error'] = "Something went wrong";
            header('location: edit-contact.php');
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
<body>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6 ">
                <?php 
                    if(isset($_SESSION['error'])){
                        echo '<div class="mb-3 alert alert-danger mt-5">' . $_SESSION["error"] . '</div>';
                        unset($_SESSION['error']);
                    }
                ?>  
                <div class="card mt-5">
                    <h1>EDIT CONTACT</h1>
                    <div class="card-body">
                        <form method='POST'>
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input id="name" name="name" type="text" class="form-control" value="<?php echo $contact['name'] ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="email" class="form-control" value="<?php echo $contact['email'] ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label for="phone">Phone</label>
                                <input id="phone" name="phone" type="number" class="form-control" value="<?php echo $contact['phone'] ?>">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="submit" class="btn btn-primary">UPDATE</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>