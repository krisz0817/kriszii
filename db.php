<?php
$HOST = 'localhost';
$USER = 'root';
$PASS = '';
$DB_NAME = 'leltar';
$conn = mysqli_connect($HOST, $USER, $PASS, $DB_NAME);
if (mysqli_connect_errno()) {
  die ('Nem sikerült csatlakozni az adatbázishoz: ' . mysqli_connect_error());
}
 ?>
