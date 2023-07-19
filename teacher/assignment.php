<?php
include('connection.php');
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignments</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <main>
        <section class="assignments">
            <h2>Assignments</h2>
            <div class="assignment-card">
                <h2>Add Assignments</h2>

                <form method="POST" action="">
                    <input type="text" name="assignment_id" placeholder="Assignment No.">
                    <label for="assignment-title">Assignment Title:</label>
                    <input type="text" id="assignment-title" name="assignment_title" placeholder="Assignment Title" required>
                    <label for="assignment-description">Assignment Description:</label>
                    <textarea id="assignment-description" name="assignment_description" rows="4" required></textarea>
                    <label for="assignment-deadline">Assignment Deadline:</label>
                    <input type="datetime-local" id="assignment-deadline" name="assignment_deadline" required>
                    <input type="submit" value="Add Assignment" name="sub">
                </form>

                <?php
                if (isset($_POST['sub'])) {
                    $assignment_id = $_POST['assignment_id'];
                    $assignment_name = $_POST['assignment_title'];
                    $assignment_date = $_POST['assignment_deadline'];
                    $assignment_desc = $_POST['assignment_description'];

                    $q = $db->prepare("INSERT INTO assignments (id, title, deadline, description) VALUES (:assignment_id, :assignment_title, :assignment_deadline, :assignment_description)");

                    $q->bindValue(':assignment_id', $assignment_id);
                    $q->bindValue(':assignment_title', $assignment_title);
                    $q->bindValue(':assignment_deadline', $assignment_date);
                    $q->bindValue(':assignment_description', $assignment_desc);
                    $q->execute();

                    $affectedRows = $q->rowCount();
                    if ($affectedRows > 0) {
                        echo "<script>alert('Assignment Added!')</script>";
                        header("Location: ./index.php");
                        exit();
                    } else {
                        echo "<script>alert('Failed! Try again')</script>";
                    }
                }

                ?>
            </div>
        </section>
        <a href="index.php" class="dashboard">Dashboard</a>
    </main>
</body>

</html>