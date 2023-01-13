<?php
session_start();

if (!isset($_SESSION['id'])) {
    header('location: login.php');
    return;
}

include 'server/dbconnect.php';

$sql = "SELECT * FROM contacts ORDER BY id DESC";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <title>Group 1</title>

    <style>
        table tr td {
            vertical-align: middle;
        }
    </style>
</head>


<body class="bg-dark">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body overflow-auto">
                        <div class="mb-5">
                            <h1 class="text-center">
                                CONTACTS PAGE
                            </h1>
                        </div>
                        <div class="mb-5 d-flex justify-content-between">
                            <a href="session.php" class="btn btn-md btn-primary">
                                Back to Home
                            </a>
                            <a href="add-contact.php" class="btn btn-md btn-primary">
                                Add New Contact
                            </a>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                if ($result->num_rows != 0) {
                                    while ($contact = $result->fetch_assoc()) {
                                        $id = $contact['id'];
                                        $name = $contact['name'];
                                        $email = $contact['email'];
                                        $phone = $contact['phone'];
                                        $type = $contact['type'];
                                        echo "<tr>
                                            <td> $id </td>
                                            <td> $name </td>
                                            <td> $email </td>
                                            <td> $phone </td>
                                            <td> $type </td>
                                            <td>
                                            <a href='edit-contact.php?id=$id'>
                                                <button class='btn btn-primary mb-2 w-100'>
                                                    EDIT
                                                </button>
                                            </a>
                                            <form action='server/delete-contact.php' method='POST'>
                                                <button class='btn btn-danger w-100' name='delete'>
                                                    DELETE
                                                </button>
                                                <input type='hidden' name='id' value='$id'></input>
                                            </form>
                                            </td>
                                            </tr>";
                                    }
                                } else {
                                    echo "No Contacts Available";
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>