<?php
include_once('connection.php');
class usr{}
$nota = ["no_nota"];
$query = mysqli_query($koneksi,"SELECT * FROM mjual where no_nota='$nota'
ORDER BY no_nota DESC limit 1");
$row = mysqli_fetch_array($query);
$username=['username'];
$query=mysqli_query($koneksi,"SELECT * FROM users where username='$username'");
$row = mysqli_fetch_array($query);

while(!empty($row))
{
$response = new usr();
$response->no_nota = $row['no_nota'];
$response->tanggal = $row['tanggal'];
$response->kembalian = $row['kembalian'];
$response->pembayaran = $row['pembayaran'];
$response->total_biaya = $row['total_biaya'];
$response->status = $row['status'];
die(json_encode($response));
}
mysqli_close($koneksi);
?>