<!DOCTYPE html>
<html>
<head>
    <title>Employee Information Form</title>
</head>
<body>
    <h1>Employee Information Form</h1>
    <form method="post" action="process.php">
        <input type="hidden" name="id" value="<?php echo $id ?? ''; ?>">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $name ?? ''; ?>" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $email ?? ''; ?>" required>
        <br>
        <label>Designation:</label>
        <input type="text" name="designation" value="<?php echo $designation ?? ''; ?>" required>
        <br>
        <label>Salary:</label>
        <input type="number" name="salary" step="0.01" value="<?php echo $salary ?? ''; ?>" required>
        <br>
        <?php if ($update === true) : ?>
            <button type="submit" name="update">Update</button>
        <?php else : ?>
            <button type="submit" name="save">Save</button>
        <?php endif; ?>
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
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($results)) : ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['designation']; ?></td>
                    <td><?php echo $row['salary']; ?></td>
                    <td><a href="index.php?edit=<?php echo $row['id']; ?>">Edit</a></td>
                    <td><a href="process.php?delete=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
