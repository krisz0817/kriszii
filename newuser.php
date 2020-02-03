<?php
  session_start();
  if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.php');
    exit();
  }
 ?>
<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="utf-8">
    <title>Új felhasználó létrehozása</title>
  </head>
  <body class="loggedin">
    <nav>
      <a href="home.php"><img src="../images/logo.png" alt="PEN" width="50"></a>
      <a href="include.php">Hozzáadás</a>
      <a href="search.php">Listázás</a>
      <a href="newuser.php">Felhasználó hozzáadása</a>
      <a href="logout.php">Kijelentkezés</a>
    </nav>
    <form class="user" method="post">
      <input type="text" name="name" placeholder="Felhasználónév">
      <input type="password" name="pass" placeholder="Jelszó">
        <p>
          <select name="role">
            <option value="1">Admin</option>
            <option value="0">Nem admin</option>
          </select>
        </p>
      <input type="submit" name="create" value="Create">
    </form>
    <?php
      include_once 'db.php';

      if (isset($_POST['create'])) {
        $user = $_POST['name'];
        $pass = $_POST['pass'];
        $role = $_POST['role'];

        $sql = "INSERT INTO login (username, password, role)
        VALUES ('$user', '$pass', '$role')";

        if (mysqli_query($conn, $sql)) {
          $message = "Sikeres hozzáadás!";
          echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
          $message = "Error: " . $sql . " " . mysqli_error($con);;
          echo "<script type='text/javascript'>alert('$message');</script>";
        }
      }
     ?>
  </body>
</html>
