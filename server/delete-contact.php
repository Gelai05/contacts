<?php
    session_start();
    include 'dbconnect.php';

    if(isset($_POST['delete'])) {
        $contact_id = $_POST['id'];

        //DELETE QUERY
        $sql = "DELETE FROM contacts WHERE id='$contact_id'";
        $conn->query($sql);
    }

    header("location: ../contacts.php");

?>