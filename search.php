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
    <title>Listázás</title>
  </head>
  <body class="loggedin">
    <nav>
      <a href="home.php"><img src="../images/logo.png" alt="PEN" width="50"></a>
      <a href="include.php">Hozzáadás</a>
      <a href="search.php">Listázás</a>
      <a href="newuser.php">Felhasználó hozzáadása</a>
      <a href="logout.php">Kijelentkezés</a>
    </nav>
    <form class="list" method="post">
      <h1>Listázás</h1>
      <input type="text" name="search" placeholder="Keresés">
      <input type="submit" name="submit" value="Listáz">
    </form>
    <table>
      <thead>
        <th>Cikkszám</th>
        <th>Név</th>
        <th>Hely</th>
      </thead>
    <?php
      include_once 'db.php';

      if (isset($_POST['submit'])) {
        $data = $_POST['search'];
        $array = explode(", ",$data);
      }

      $arraylength = count($array);

      $i = 0;
      while ($i < $arraylength) {
        $result = mysqli_query($conn,"SELECT * FROM data_table WHERE kkszam LIKE '$array[$i]'");
        $_SESSION['adat'] = $array[$i];

        if (mysqli_num_rows($result) > 0) {
          $j = 0;
          while ($row = mysqli_fetch_array($result)) {
            ?>
              <tbody>
                <td><?php echo $row["kkszam"] ?></td>
                <td><?php echo $row["Megnev"] ?></td>
                <td><?php echo $row["Hely"] ?></td>
              </tbody>
            <?php
            $j++;
          }
        }
        $i++;
      }
     ?>
    </table>
  </body>
</html>
