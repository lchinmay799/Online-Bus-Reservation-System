<?php
$host="localhost";
$username="root";
$password='p@55w06d';
$conn = mysqli_connect($host, $username, $password,"busreservationsystem")or die("cannot connect bro");
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
mysqli_close($conn);
?>