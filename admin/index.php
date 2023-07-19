<?php
include('connection.php');
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <div class="button-container">
        <button><a href='student.php' style="text-decoration: none;">Student</a></button>
        <button><a href='teacher.php' style="text-decoration: none;">Teacher</a></button>
        <button><a href='logout.php' style="text-decoration: none;">Logout</a></button>
    </div>

</body>
</html>