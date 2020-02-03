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
     <title>Hozzáadás</title>
   </head>
   <body class="loggedin">
     <nav>
       <a href="home.php"><img src="../images/logo.png" alt="PEN" width="50"></a>
       <a href="include.php">Hozzáadás</a>
       <a href="search.php">Listázás</a>
       <a href="newuser.php">Felhasználó hozzáadása</a>
       <a href="logout.php">Kijelentkezés</a>
     </nav>
     <form class="incl-form" method="post">
       <input type="text" name="kkszam" placeholder="Cikkszám">
       <input type="text" name="Eszköz" placeholder="Eszköz">
       <input type="text" name="lelszam" placeholder="Leltárszám">
       <input type="text" name="Megnev" placeholder="Megnevezés">
       <input type="date" name="dátuma">
       <input type="text" name="Beszért" placeholder="Beszerzési érték">
       <input type="text" name="Telephely" placeholder="Telephely">
       <input type="text" name="Gyártszám" placeholder="Gyártási szám">
       <input type="text" name="Típusmegn" placeholder="Típusmegnevezés">
       <input type="text" name="Mennyiség" placeholder="Mennyiség">
       <select name="Tipus">
         <option value="SZOFTVER">Szoftver</option>
         <option value="NEM INFO">Nem infó</option>
         <option value="INFO">Infó</option>
       </select>
       <input type="text" name="Hely" placeholder="Hely">
       <input type="text" name="Megjegyzés" placeholder="Megjegyzés">
       <input type="submit" name="submit" value="Hozzáadás">
     </form>
     <?php
      include_once 'db.php';

      if (isset($_POST['submit'])) {
        $kkszam = $_POST['kkszam'];
        $eszkoz = $_POST['Eszköz'];
        $lelszam = $_POST['lelszam'];
        $megnev = $_POST['Megnev'];
        $datum = $_POST['dátuma'];
        $beszert = $_POST['Beszért'];
        $penznem = "HUF";
        $telephely = $_POST['Telephely'];
        $gyartszam = $_POST['Gyártszám'];
        $tipusmegn = $_POST['Típusmegn'];
        $mennyiseg = $_POST['Mennyiség'];
        $mennyitip = "DB";
        $tipus = $_POST['Tipus'];
        $hely = $_POST['Hely'];
        $megj = $_POST['Megjegyzés'];

        $sql = "INSERT INTO data_table (kkszam, Eszköz, lelszam, Megnev, dátuma, Beszért, Pénznem, Telephely, Gyártszám, Típusmegn, Mennyiség, mennyitip, Tipus, Hely, Megjegyzés)
        VALUES ('$kkszam', '$eszkoz', 'lelszam', '$megnev', '$datum', '$beszert', '$penznem', '$telephely', '$gyartszam', '$tipusmegn', '$mennyiseg', '$mennyitip', '$tipus', '$hely', '$megj')";

        if (mysqli_query($conn,$sql)) {
          $message = "Sikeres hozzáadás!";
          echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
          $message = "Error: " . $sql . " " . mysqli_error($conn);;
          echo "<script type='text/javascript'>alert('$message');</script>";
        }
      }
      ?>
   </body>
 </html>
