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

            <?php
include('connection.php');

if (isset($_POST['sub'])) {
    $assignmentIds = $_POST['assignmentId'];
    $answers = array();
    foreach ($assignmentIds as $assignmentId) {
        $answers[$assignmentId] = $_POST['ans' . $assignmentId];
    }

    $q = $db->prepare("SELECT * FROM assignments WHERE id = :assignmentId");
    $q->bindParam(':assignmentId', $assignmentId);
    $q->execute();

    foreach ($assignmentIds as $assignmentId) {
        $assignmentDetails = $q->fetch(PDO::FETCH_ASSOC);
        $answer = $answers[$assignmentId];

        $q = $db->prepare("INSERT INTO answers (id, title, deadline, description, answers) VALUES (:assignmentId, :title, :deadline, :description, :ans)");
        $q->bindValue(':assignmentId', $assignmentId);
        $q->bindValue(':title', $assignmentDetails['title']);
        $q->bindValue(':deadline', $assignmentDetails['deadline']);
        $q->bindValue(':description', $assignmentDetails['description']);
        $q->bindValue(':ans', $answer);
        $q->execute();

        $q = $db->prepare("DELETE FROM assignments WHERE id = :assignmentId");
        $q->bindValue(':assignmentId', $assignmentId);
        $q->execute();
    }

    $affectedRows = $q->rowCount();
    if ($affectedRows > 0) {
        echo "<script>alert('Answer Submitted!')</script>";
        header("Location: ./index.php");
        exit();
    } else {
        echo "<script>alert('Failed to submit answer. Please try again.')</script>";
    }
}

$q = ("SELECT * FROM assignments");
$result = $db->query($q);

if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $assignmentId = $row['id'];
        $assignmentTitle = $row['title'];
        $assignmentDeadline = $row['deadline'];
        $assignmentDescription = $row['description'];
?>

        <div class="assignment-card">
            <h3><?php echo $assignmentTitle; ?></h3>
            <p>Deadline: <?php echo $assignmentDeadline; ?></p>
            <p>Description: <?php echo $assignmentDescription; ?></p>
            <form action="" method="POST">
                <label for="ans<?php echo $assignmentId; ?>">Your Answer:</label>
                <textarea id="ans<?php echo $assignmentId; ?>" name="ans<?php echo $assignmentId; ?>" rows="4" cols="50"></textarea>
                <input type="hidden" name="assignmentId[]" value="<?php echo $assignmentId; ?>">
                <input type="submit" value="Submit" name="sub">
            </form>
        </div>

<?php
    }
} else {
    echo "<p>No assignments found.</p>";
}
?>
<?php
            include('connection.php');

            if (isset($_POST['sub'])) {
                $assignmentIds = $_POST['assignmentId'];
                $answers = array();
                foreach ($assignmentIds as $assignmentId) {
                    $answers[$assignmentId] = $_POST['ans' . $assignmentId];
                }

                $q = $db->prepare("SELECT * FROM assignments WHERE id = :assignmentId");
                $q->bindParam(':assignmentId', $assignmentId);
                $q->execute();

                foreach ($assignmentIds as $assignmentId) {
                    $assignmentDetails = $q->fetch(PDO::FETCH_ASSOC);
                    $answer = $answers[$assignmentId];

                    $q = $db->prepare("INSERT INTO answers (id, title, deadline, description, answers) VALUES (:assignmentId, :title, :deadline, :description, :ans)");
                    $q->bindValue(':assignmentId', $assignmentId);
                    $q->bindValue(':title', $assignmentDetails['title']);
                    $q->bindValue(':deadline', $assignmentDetails['deadline']);
                    $q->bindValue(':description', $assignmentDetails['description']);
                    $q->bindValue(':ans', $answer);
                    $q->execute();

                    $q = $db->prepare("DELETE FROM assignments WHERE id = :assignmentId");
                    $q->bindValue(':assignmentId', $assignmentId);
                    $q->execute();
                }

                $affectedRows = $q->rowCount();
                if ($affectedRows > 0) {
                    echo "<script>alert('Answer Submitted!')</script>";
                    header("Location: ./index.php");
                    exit();
                } else {
                    echo "<script>alert('Failed to submit answer. Please try again.')</script>";
                }
            }

            $q = ("SELECT * FROM assignments");
            $result = $db->query($q);

            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    $assignmentId = $row['id'];
                    $assignmentTitle = $row['title'];
                    $assignmentDeadline = $row['deadline'];
                    $assignmentDescription = $row['description'];
            ?>

                    <div class="assignment-card">
                        <h3><?php echo $assignmentTitle; ?></h3>
                        <p>Deadline: <?php echo $assignmentDeadline; ?></p>
                        <p>Description: <?php echo $assignmentDescription; ?></p>
                        <form action="" method="POST">
                            <label for="ans<?php echo $assignmentId; ?>">Your Answer:</label>
                            <textarea id="ans<?php echo $assignmentId; ?>" name="ans<?php echo $assignmentId; ?>" rows="4" cols="50"></textarea>
                            <input type="hidden" name="assignmentId[]" value="<?php echo $assignmentId; ?>">
                            <input type="submit" value="Submit" name="sub">
                        </form>
                    </div>

            <?php
                }
            } else {
                echo "<p>No assignments found.</p>";
            }
            ?>
        </section>
        <a href="index.php" class="dashboard">Dashboard</a>
    </main>
</body>

</html>