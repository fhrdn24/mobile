<?php  
	include_once('connection.php'); 

	$kd_brg = $_POST['kd_brg'];
	$nm_brg = $_POST['nm_brg'];
	$harga = $_POST['harga'];
	$gambar = $_POST['gambar'];

	$getdata = mysqli_query($koneksi,"SELECT * FROM tb_barang WHERE kd_brg ='$kd_brg'"); 
	$rows = mysqli_num_rows($getdata);
	$respose = array();

	if($rows > 0 )
	{
		$query = "UPDATE tb_barang SET nm_brg='$nm_brg',harga='$harga',gambar='$gambar' WHERE kd_brg='$kd_brg'";
		$exequery = mysqli_query($koneksi,$query);
		if($exequery)
		{
				$respose['code'] =1;
				$respose['message'] = "Update Success";
		}
		else
		{
				$respose['code'] =0;
				$respose['message'] = "Failed Update";
		}
	}
	else
	{
				$respose['code'] =0;
				$respose['message'] = "Failed Update : data tidak ditemukan";
	}
	
	echo json_encode($respose);
?>

