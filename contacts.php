<?php
session_start();

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

<body>
    <h1 class="text-center">LOGIN FORM</h1>
    <div class="container">
        <div class="row justify-content-center">
            <a href="add-contact.php">
                <button class="btn btn-md btn-primary float-end">
                    ADD NEW CONTACT
                </button>
            </a>
            <div class="col-md-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
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
                                echo "<tr>
                                <td> $id </td>
                                <td> $name </td>
                                <td> $email </td>
                                <td> $phone </td>
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

</body>

</html>