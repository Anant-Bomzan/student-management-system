<?php
include('connection.php');
include('header.php');
$page1 = 'http://localhost/class/student/index.php';
$page2 = 'http://localhost/class/teacher/index.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Josefin+Sans" />
    <script src="https://kit.fontawesome.com/4cd457a180.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="home.css">
  <script>
    function toggleLoginForm(id) {
      const form = document.getElementById(id);
      form.classList.toggle('show');
    }
  </script>
</head>

<body>
  <div class="container">
    <h2>LOGIN</h2>

    <div class="icons">
        <div class="icon-label">Student</div>
      <div class="icon" style="background-image: url(student.png)" onclick="toggleLoginForm('student-login-form')"></div>
      <div class="icon" style="background-image: url(teacher.png)" onclick="toggleLoginForm('teacher-login-form')"></div>
      <div class="icon-label">Teacher</div>
    </div>

    <div class="form-group">
        <form id="student-login-form" class="login-form" action="" method="POST">
          <label for="student-username">Student Username</label>
          <input type="text" id="student-username" placeholder="Enter your username"  name="un">
          <label for="student-password">Student Password</label>
          <input type="password" id="student-password" placeholder="Enter your password"  name="ps">
          <input type="submit" value="Student Login" name="sub">
        </form>

        <?php
          if (isset($_POST['sub'])) {
            $un = $_POST['un'];
            $ps = $_POST['ps'];
            $q = $db->query("SELECT * FROM student WHERE uname='$un' && pass='$ps'");
            $q->execute();
            $res = $q->fetchAll(PDO::FETCH_OBJ);
            if ($res) {
              session_start();
              $_SESSION['loggedin'] = true;
              $_SESSION['uname'] = $un;
              header('Location: ' .$page1);
            } else {
              echo "<script>alert('Wrong User!')</script>";
            }
          }
        ?>
      </div>

      <div class="form-group">
        <form id="teacher-login-form" class="login-form" action="" method="POST">
          <label for="teacher-username">Teacher Username</label>
          <input type="text" id="teacher-username" placeholder="Enter your username" name="un">
          <label for="teacher-password">Teacher Password</label>
          <input type="password" id="teacher-password" placeholder="Enter your password" name="ps">
          <input type="submit" value="Teacher Login" name="sub">
        </form>

        <?php
          if (isset($_POST['sub'])) {
            $un = $_POST['un'];
            $ps = $_POST['ps'];
            $q = $db->query("SELECT * FROM teacher WHERE uname='$un' && pass='$ps'");
            $q->execute();
            $res = $q->fetchAll(PDO::FETCH_OBJ);
            if ($res) {
              session_start();
              $_SESSION['loggedin'] = true;
              $_SESSION['uname'] = $un;
              header('Location: ' .$page2);
            } else {
              echo "<script>alert('Wrong User!')</script>";
            }
          }
        ?>
      </div>
  </div>
  <a href="/class/admin.php" class="admin-login">Admin Login</a>
</body>
</html>
