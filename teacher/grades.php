<?php
include('connection.php');
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grades</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Grades</h1>
    <div class="content">
        <h2>Add Grades</h2>

        <form method="POST" action="">
            <input type="text" name="course_id" placeholder="Course ID">
            <input type="text" name="course_name" placeholder="Course Name">
            <input type="text" name="grades" placeholder="Grades">
            <input type="submit" value="Add Grade" name="sub">
        </form>
        <?php
        if (isset($_POST['sub'])) {
            $course_id = $_POST['course_id'];
            $course_name = $_POST['course_name'];
            $grade = $_POST['grades'];

            $q = $db->prepare("INSERT INTO grades (id, cname, grade) VALUES (:course_id, :course_name, :grades)");

            $q->bindValue(':course_id', $course_id);
            $q->bindValue(':course_name', $course_name);
            $q->bindValue(':grades', $grade);
            $q->execute();

            $affectedRows = $q->rowCount();
            if ($affectedRows > 0) {
            echo "<script>alert('Grade Added!')</script>";
            header("Location: ./grades.php");
            exit();
            } else {
                echo "<script>alert('Failed! Try again')</script>";
            }
        }
        ?>

        <h2>Total Grades</h2>

        <table>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
                <th>Grades</th>
            </tr>
            <?php
            $q = $db->query("SELECT * FROM grades");
            while ($p = $q->fetch(PDO::FETCH_OBJ)) {
            ?>
                <tr>
                    <td><?= $p->id; ?></td>
                    <td><?= $p->cname; ?></td>
                    <td><?= $p->grade; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <a href="index.php" class="dashboard">Dashboard</a>
</body>

</html>