<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM students WHERE student_id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        echo "Student not found!";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_fname = $_POST['student_fname'];
    $student_lname = $_POST['student_lname'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $course = $_POST['course'];

    $sql = "UPDATE students 
            SET student_fname='$student_fname', student_lname='$student_lname', email='$email', age='$age', course='$course' 
            WHERE student_id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: select.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Student</title>
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

    <h2>Edit Student</h2>

    <form method="POST">
        <div class="mb-3">
            <label>First Name:</label>
            <input type="text" name="student_fname" value="<?php echo $row['student_fname']; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Last Name:</label>
            <input type="text" name="student_lname" value="<?php echo $row['student_lname']; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Age:</label>
            <input type="number" name="age" value="<?php echo $row['age']; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Course:</label>
            <input type="text" name="course" value="<?php echo $row['course']; ?>" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="select.php" class="btn btn-secondary">Back</a>
    </form>

</body>
</html>
