<?php include 'db_connect.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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

<h2>Add Student</h2>

<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_fname  = $_POST['student_fname'];
    $student_mname  = $_POST['student_mname'];
    $student_lname  = $_POST['student_lname'];
    $email          = $_POST['email'];
    $age            = $_POST['age'];
    $course         = $_POST['course'];

    $sql = "INSERT INTO students (student_fname, student_mname, student_lname, email, age, course) 
            VALUES ('$student_fname', '$student_mname', '$student_lname', '$email', $age, '$course')";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    echo "<br><a href='select.php'>Back to list</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

    $conn->close();
}
?>

<form method="POST">
    <div class="mb-3">
        <label>First Name:</label>
        <input type="text" name="student_fname" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Middle Initial:</label>
        <input type="text" name="student_mname" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Last Name:</label>
        <input type="text" name="student_lname" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email:</label>
        <input type="email" name="email" class="form-control" required
            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
            title="Please enter a valid email address." >
    </div>
    <div class="mb-3">
        <label>Age:</label>
        <input type="text" name="age" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Course:</label>
        <input type="text" name="course" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
    <a href="select.php" class="btn btn-secondary">Back</a>
</form>

</body>
</html>
