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