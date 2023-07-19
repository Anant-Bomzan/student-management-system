<?php
include('connection.php');
include('header.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Josefin+Sans" />
    <script src="https://kit.fontawesome.com/4cd457a180.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Classroom - Student Dashboard</h1>

        <div class="button-container">
            <button><a href='courses.php'>Courses</a></button>
            <button><a href='assignment.php'>Assignments</a></button>
            <button><a href='grades.php'>Grades</a></button>
            <button><a href='logout.php'>Logout</a></button>
        </div>

        <div class="content">
            <?php
            $q = $db->query("SELECT * FROM student");
            while ($p = $q->fetch(PDO::FETCH_OBJ)) {
            ?>
                <h2>Welcome, <?= $p->sname; ?>!</h2>
            <?php
            }
            ?>

            <p>Your enrolled courses:</p>
            <ul>
                <?php
                $q = $db->query("SELECT * FROM courses");
                while ($p = $q->fetch(PDO::FETCH_OBJ)) {
                ?>
                    <li><?= $p->cname; ?></li>
                <?php
                }
                ?>
            </ul>

            <p>Upcoming assignments:</p>
            <ul>
                <?php
                $q = ("SELECT * FROM assignments");
                $result = $db->query($q);

                if ($result->rowCount() > 0) {
                    while ($p = $result->fetch(PDO::FETCH_OBJ)) {
                ?>
                        <li>Title: <?= $p->title; ?><br> Date of submission: <?= $p->deadline; ?></li>
                <?php
                    }
                } else {
                    echo "<li>No Assignments found.</li>";
                }
                ?>
            </ul>

            <p>Grades:</p>
            <ul>
                <?php
                $q = $db->query("SELECT * FROM grades");
                while ($p = $q->fetch(PDO::FETCH_OBJ)) {
                ?>
                    <li><?= $p->cname; ?>: <?= $p->grade; ?>%</li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</body>

</html>