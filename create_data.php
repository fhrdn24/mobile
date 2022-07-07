<?php 
	include_once('connection.php'); 

	$kd_brg =$_POST['kd_brg'];
	$nm_brg=$_POST['nm_brg'];
	$harga=$_POST['harga'];
	$gambar=$_POST['gambar'];

	$insert = "INSERT INTO tb_barang(kd_brg,nm_brg,harga,gambar) VALUES ('$kd_brg','$nm_brg','$harga','$gambar')";
	$exeinsert = mysqli_query($koneksi,$insert);
	$response = array();
	if($exeinsert)
	{
		$response['code'] =1;
		$response['message'] = "Success ! Data di tambahkan";
	}
	else
	{
		$response['code'] =0;
		$response['message'] = "Failed ! Data Gagal di tambahkan";
	}
		echo json_encode($response);
 ?>