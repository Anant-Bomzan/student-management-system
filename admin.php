<?php
include('connection.php');
include('header.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Josefin+Sans" />
    <script src="https://kit.fontawesome.com/4cd457a180.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <h2>Admin</h2>

    <div class="form-group">
        <form id="admin-login-form" class="login-form" action="" method="POST">
          <label for="admin-username">Username</label>
          <input type="text" id="admin-username" placeholder="Enter your username"  name="un">
          <label for="admin-password">Password</label>
          <input type="password" id="admin-password" placeholder="Enter your password"  name="ps">
          <input type="submit" value="Admin Login" name="sub">
        </form>

        <?php
          if (isset($_POST['sub'])) {
            $un = $_POST['un'];
            $ps = $_POST['ps'];
            $q = $db->query("SELECT * FROM admin WHERE uname='$un' && pass='$ps'");
            $q->execute();
            $res = $q->fetchAll(PDO::FETCH_OBJ);
            if ($res) {
              session_start();
              $_SESSION['loggedin'] = true;
              $_SESSION['uname'] = $un;
              header('Location: ./admin/index.php');
            } else {
              echo "<script>alert('Wrong User!')</script>";
            }
          }
        ?>
      </div>
      <a href="index.php"><i class="fa fa-sign-out"><style>a{color: green;}</style></i></a>
    </body>
</html>
