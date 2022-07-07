<?php
$koneksi = mysqli_connect("localhost","root","","penjualan1");
if (!$koneksi) {
die("Connection failed: " . mysqli_connect_error());
}