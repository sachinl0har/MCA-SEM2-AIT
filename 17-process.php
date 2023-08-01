<?php
// Establish database connection
$db = mysqli_connect('localhost', 'username', 'password', 'employees_db');

// Initialize variables
$id = 0;
$name = '';
$email = '';
$designation = '';
$salary = '';
$update = false;

// Save Employee Information
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $designation = $_POST['designation'];
    $salary = $_POST['salary'];

    $query = "INSERT INTO employees (name, email, designation, salary) VALUES ('$name', '$email', '$designation', '$salary')";
    mysqli_query($db, $query);
    header('location: index.php');
}

// Update Employee Information
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $designation = $_POST['designation'];
    $salary = $_POST['salary'];

    $query = "UPDATE employees SET name='$name', email='$email', designation='$designation', salary='$salary' WHERE id=$id";
    mysqli_query($db, $query);
    header('location: index.php');
}

// Delete Employee Information
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "DELETE FROM employees WHERE id=$id";
    mysqli_query($db, $query);
    header('location: index.php');
}

// Retrieve Employee List
$results = mysqli_query($db, "SELECT * FROM employees");
