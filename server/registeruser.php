<?php
session_start();

include 'dbconnect.php';

$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

//Validate Inputs
if($username == ''){
    $_SESSION['error'] = "Empty Field!";
    header('location: ../register.php');
    return;
}
if($password == ''){
    $_SESSION['error'] = "Invalid Password";
    header('location: ../register.php');
    return;
}

if ($password != $confirmPassword){
    $_SESSION['error'] = "password does not match!";
    header('location: ../register.php');
    return;
}

//Select Query
$sql = "SELECT username FROM users WHERE username='$username'";
$result = $conn->query($sql);

//Already Exist
if ($result->num_rows != 0){
    $_SESSION['error'] = "Already Exist!";
    header('location: ../register.php');
    return;
}

//Hash password
$password = password_hash($password, PASSWORD_DEFAULT);

//INSERT QUERY
$sql = "INSERT INTO users (username,password) VALUES ('$username', '$password')";
$result = $conn->query($sql);

//Error! Something went Wrong!
if(!$result ){
    $_SESSION['error'] = "Something Went Wrong!";
    header('location: ../register.php');
    return;
}

$_SESSION['success'] = "Registered Success!";
header('location: ../login.php');



