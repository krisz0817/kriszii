<?php
  session_start();
  if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit();
  }
 ?>
<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="utf-8">
    <title>Leltár - Home</title>
  </head>
  <body class="loggedin">
    <nav>
      <a href="home.php"><img src="logo.png" alt="PEN" width="50"></a>
      <a href="include.php">Hozzáadás</a>
      <a href="search.php">Listázás</a>
      <a href="newuser.php">Felhasználó hozzáadása</a>
      <a href="logout.php">Kijelentkezés</a>
    </nav>
    <table>
      <thead>
        <th>Cikkszám</th>
        <th>Hely</th>
        <th>Megnevezés</th>
      </thead>
        <?php
          include_once 'db.php';

          $sql = "SELECT * FROM data_table";
          $result = $conn->query($sql);

          if($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              ?>
                <tbody>
                  <td><?php echo $row["kkszam"] ?></td>
                  <td><?php echo $row["Hely"] ?></td>
                  <td><?php echo $row["Megnev"] ?></td>
                </tbody>
              <?php
            }
          } else {
            echo "0 result...";
          }
         ?>
    </table>
  </body>
</html>
