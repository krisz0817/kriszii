<!DOCTYPE html>
<html lang=hu>
  <head>
    <meta charset="utf-8">
    <title>PEN leltár 2.0</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
  </head>
  <body>
    <div class="main_logo">
      <img src="images/logo.png" alt="PEN" width="250">
    </div>
    <form class="login-form" method="post">
      <h1>Bejelentkezés</h1>
      <input type="text" name="username" placeholder="Felhasználónév" required>
      <input type="password" name="password" placeholder="Jelszó" required>
      <input type="submit" class="logbtn" value="Login">
    </form>
    <?php
      session_start();
      include_once 'pages/db.php';

      if ($stmt = $conn->prepare('SELECT id, password FROM login WHERE username = ?')) {
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $stmt->store_result();
      }
      if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();

        if ($_POST['password'] === $password) {
          session_regenerate_id();
          $_SESSION['loggedin'] = TRUE;
          $_SESSION['name'] = $_POST['username'];
          $_SESSION['id'] = $id;
          header('Location: pages/home.php');
        } else {
          $message = "Password incorrect.\\nTry again.";
          echo "<script type='text/javascript'>alert('$message');</script>";
        }
      } else {
        $message = "Username incorrect.\\nTry again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
      }
      $stmt->close();
     ?>
  </body>
</html>
