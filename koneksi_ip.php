<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "penjualan1"; 
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn)
  {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
  }
  //echo "Connected successfully";
?>