<?php
$con=mysqli_connect("localhost","root","","penjualan1");
// Check connection
if (mysqli_connect_error())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
//  echo "Connection success";
// mysqli_close($con);
 ?> 