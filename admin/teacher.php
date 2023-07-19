<?php
include('connection.php');
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Data</title>
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
    <h1>Teacher Data</h1>
    <div class="content">
        <h2>Teachers name</h2>

        <table>
            <tr>
                <th>Teacher ID</th>
                <th>Teacher username</th>
                <th>Teacher password</th>
            </tr>
            <?php
            $q = $db->query("SELECT * FROM teacher");
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

        <h2>Add Teacher</h2>

        <form method="POST" action="">
            <input type="text" name="teacher_id" placeholder="Teacher ID">
            <input type="text" name="teacher_name" placeholder="Teacher Name">
            <input type="password" id="teacher-password" placeholder="Teacher Password">
            <input type="submit" value="Add teacher" name="sub">
        </form>
        <?php
        if (isset($_POST['sub'])) {
            $teacher_id = $_POST['teacher_id'];
            $teacher_name = $_POST['teacher_name'];
            $teacher_pass = $_POST['teacher_password'];

            $q = $db->prepare("INSERT INTO teacher (id, uname, pass) VALUES (:teacher_id, :teacher_name, :teacher_password)");

            $q->bindValue(':teacher_id', $teacher_id);
            $q->bindValue(':teacher_name', $teacher_name);
            $q->bindValue(':teacher_password', $teacher_pass);
            $q->execute();

            $affectedRows = $q->rowCount();
            if ($affectedRows > 0) {
                echo "<script>alert('Teacher Added!')</script>";
                header("Location: ./teacher.php");
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