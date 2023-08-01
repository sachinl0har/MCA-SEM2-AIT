<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
</head>
<body>
    <h1>Student Registration</h1>
    <form method="post" action="process.php">
        <label>Username:</label>
        <input type="text" name="username" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <label>First Name:</label>
        <input type="text" name="firstname" required>
        <br>
        <label>Last Name:</label>
        <input type="text" name="lastname" required>
        <br>
        <label>Mobile No:</label>
        <input type="text" name="mobile" required>
        <br>
        <label>Address:</label>
        <input type="text" name="address" required>
        <br>
        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>
