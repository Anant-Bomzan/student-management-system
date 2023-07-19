<?php
include('connection.php');
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Courses</h1>
    <div class="content">
        <h2>Enrolled Courses</h2>

        <table>
            <tr>
                <th>Course ID</th>
                <th>Course Name</th>
            </tr>
            <?php
            $q = $db->query("SELECT * FROM courses");
            while ($p = $q->fetch(PDO::FETCH_OBJ)) {
            ?>
                <tr>
                    <td><?= $p->id; ?></td>
                    <td><?= $p->cname; ?></td>
                </tr>
            <?php
            }
            ?>
        </table>

        <h2>Add New Course</h2>

        <form method="POST" action="">
            <input type="text" name="course_id" placeholder="Course ID">
            <input type="text" name="course_name" placeholder="Course Name">
            <input type="submit" value="Add Course" name="sub">
        </form>
        <?php
        if (isset($_POST['sub'])) {
            $course_id = $_POST['course_id'];
            $course_name = $_POST['course_name'];

            $q = $db->prepare("INSERT INTO courses (id, cname) VALUES (:course_id, :course_name)");

            $q->bindValue(':course_id', $course_id);
            $q->bindValue(':course_name', $course_name);
            $q->execute();

            $affectedRows = $q->rowCount();
            if ($affectedRows > 0) {
                echo "<script>alert('Course Added!')</script>";
                header("Location: ./index.php");
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