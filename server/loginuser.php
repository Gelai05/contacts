<?php
session_start();

include 'dbconnect.php';

$username = $_POST['username'];
$password = $_POST['password'];

//Validate Inputs
if($username == ''){
    $_SESSION['error'] = "Invalid Username";
    header('location: ../login.php');
    return;
}
if($password == ''){
    $_SESSION['error'] = "Invalid Password";
    header('location: ../login.php');
    return;
}
//Select Query
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

//Not Found 
if ($result->num_rows == 0){
    $_SESSION['error'] = "User Not Found";
    header('location: ../login.php');
    return;
}

//get First Result
$user = $result->fetch_assoc();

//Verify Password
if (!password_verify($password,$user['password'])){
    $_SESSION['error'] = "Credentials Do Not Match!";
    header('location: ../login.php');
    return;
}
//Storing User ID to Session Superglobal
$_SESSION['id'] = $user['id'];
$_SESSION['username'] = $user['username'];

header('location: ../session.php');
