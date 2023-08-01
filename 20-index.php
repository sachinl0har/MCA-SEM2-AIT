<!DOCTYPE html>
<html>
<head>
    <title>Employee Information</title>
</head>
<body>
    <h1>Employee Information</h1>
    <h2>Add Employee</h2>
    <form method="post" action="">
        <label>Name:</label>
        <input type="text" name="name" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" required>
        <br>
        <label>Designation:</label>
        <input type="text" name="designation" required>
        <br>
        <label>Salary:</label>
        <input type="number" name="salary" step="0.01" required>
        <br>
        <button type="submit" name="add">Add Employee</button>
    </form>

    <h2>Employee List</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Designation</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $db = mysqli_connect('localhost', 'username', 'password', 'employees_db');

            // Insert new employee
            if (isset($_POST['add'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $designation = $_POST['designation'];
                $salary = $_POST['salary'];

                $query = "INSERT INTO employees (name, email, designation, salary) VALUES ('$name', '$email', '$designation', '$salary')";
                mysqli_query($db, $query);
            }

            // Delete employee
            if (isset($_GET['delete'])) {
                $id = $_GET['delete'];
                $query = "DELETE FROM employees WHERE id=$id";
                mysqli_query($db, $query);
            }

            // Fetch and display employee list
            $query = "SELECT * FROM employees";
            $results = mysqli_query($db, $query);

            while ($row = mysqli_fetch_assoc($results)) :
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['designation']; ?></td>
                    <td><?php echo $row['salary']; ?></td>
                    <td><a href="index.php?delete=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
