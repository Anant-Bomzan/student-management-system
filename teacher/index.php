<?php
include('connection.php');
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <h1>Teacher Dashboard</h1>

    <main>
        <div class="button-container">
            <button><a href='assignment.php'>Assignments</a></button>
            <button><a href='grades.php'>Grades</a></button>
            <button><a href='logout.php'>Logout</a></button>
        </div>

        <div class="content">
        <?php
            $q = $db->query("SELECT * FROM teacher");
            while ($p = $q->fetch(PDO::FETCH_OBJ)) {
            ?>
                <h2>Welcome, <?= $p->tname; ?>!</h2>
            <?php
            }
            ?>

            <p>Assignments submissions:</p>
            <table>
                <tr>
                    <th>Assignment No.</th>
                    <th>Assignment Title</th>
                    <th>Assignment Description</th>
                    <th>Answers</th>
                </tr>
                <?php
                $q = $db->query("SELECT * FROM answers");
                while ($p = $q->fetch(PDO::FETCH_OBJ)) {
                ?>
                    <tr>
                        <td><?= $p->id; ?></td>
                        <td><?= $p->title; ?></td>
                        <td><?= $p->description; ?></td>
                        <td><?= $p->answers; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>

            <h2>Assignments: </h2>
            <div class="assignment-card">
                <?php
                $q = $db->query("SELECT * FROM assignments");
                while ($p = $q->fetch(PDO::FETCH_OBJ)) {
                ?>
                    <p>Assignment No. <?= $p->id; ?></p>
                    <p>Assignment Title: <?= $p->title; ?></p>
                    <p>Deadline: <?= $p->deadline; ?></p>
                    <p>Description: <?= $p->description; ?></p>
                <?php
                }
                ?>
            </div>
    </main>
</body>

</html>