<?php
include 'db_connect.php';

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    :root {
        --custom-primary: #9FB3DF;
        --custom-secondary: #9FCEFA;
        --custom-tertiary: #BFDFE5;
        --custom-light: #FFF5DE;
    }

    body {
        min-height: 100vh;
        margin: 0;
        background: linear-gradient(
            to bottom right,
            var(--custom-primary),
            var(--custom-secondary),
            var(--custom-tertiary),
            var(--custom-light)
        );
    }
    </style>
</head>
<body class="container mt-5">

    <h2 class="mb-4">Student List</h2>

    <a href="insert.php" class="btn btn-success mb-3">Add New Student</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Course</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['student_id']}</td>
                        <td>{$row['student_fname']}</td>
                        <td>{$row['student_mname']}</td>
                        <td>{$row['student_lname']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['course']}</td>
                        <td>{$row['create_at']}</td>
                        <td>
                            <a href='update.php?id={$row['student_id']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='delete.php?id={$row['student_id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure?')\">Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='8' class='text-center'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>

<?php $conn->close(); ?>
