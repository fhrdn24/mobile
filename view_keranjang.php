<?php
include_once("connection.php");
header("Content-Type: application/json");
header("Content-Type: application/multipart");
header('Content-type=application/json; charset=utf-8');
$kd_kons = $_POST['kd_kons'];
$query = "SELECT * FROM mjual WHERE `kd_kons`= '$kd_kons' ORDER BY `tgl_jual` DESC";
$result = mysqli_query($koneksi,$query);
$arraydata = array();

while($baris = mysqli_fetch_assoc($result)){
    $arraydata[] = $baris;
}
echo json_encode([
    'data' => $arraydata,
    'meta' => [
        'code' => 200,
        'status' => true,
        'message' => 'success',
    ],
]);
?>