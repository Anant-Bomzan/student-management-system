<?php
include('connection.php');
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        .dashboard {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 14px;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Student Data</h1>
    <div class="content">
        <h2>Students name</h2>

        <table>
            <tr>
                <th>Student ID</th>
                <th>Student username</th>
                <th>Student password</th>
            </tr>
            <?php
            $q = $db->query("SELECT * FROM student");
            while ($p = $q->fetch(PDO::FETCH_OBJ)) {
            ?>
                <tr>
                    <td><?= $p->id; ?></td>
                    <td><?= $p->uname; ?></td>
                    <td><?= $p->pass; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>

        <h2>Add Student</h2>

        <form method="POST" action="">
            <input type="text" name="student_id" placeholder="Student ID">
            <input type="text" name="student_name" placeholder="Student Name">
            <input type="password" id="student-password" placeholder="Student Password">
            <input type="submit" value="Add student" name="sub">
        </form>
        <?php
        if (isset($_POST['sub'])) {
            $student_id = $_POST['student_id'];
            $student_name = $_POST['student_name'];
            $student_pass = $_POST['student_password'];

            $q = $db->prepare("INSERT INTO student (id, uname, pass) VALUES (:student_id, :student_name, :student_password)");

            $q->bindValue(':student_id', $student_id);
            $q->bindValue(':student_name', $student_name);
            $q->bindValue(':student_password', $student_pass);
            $q->execute();

            $affectedRows = $q->rowCount();
            if ($affectedRows > 0) {
                echo "<script>alert('Student Added!')</script>";
                header("Location: ./student.php");
                exit();
            } else {
                echo "<script>alert('Failed! Try again')</script>";
            }
        }

        ?>

    </div>
    <a href="index.php" class="dashboard">Dashboard</a>
</body>

</html>