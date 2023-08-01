<?php
session_start();
$db = mysqli_connect('localhost', 'username', 'password', 'students_db');

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    $query = "INSERT INTO students (username, password, firstname, lastname, mobile, address) 
              VALUES ('$username', '$password', '$firstname', '$lastname', '$mobile', '$address')";
    mysqli_query($db, $query);
    header('location: login.php');
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM students WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header('location: dashboard.php');
    } else {
        echo "Invalid username or password. Please try again.";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('location: login.php');
}
?>
