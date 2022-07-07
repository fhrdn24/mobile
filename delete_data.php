<?php 
	include_once('connection.php');
	$kd_brg = $_POST['kd_brg']; 
	$getdata = mysqli_query($koneksi,"SELECT * FROM tb_barang WHERE kd_brg ='$kd_brg'");
	$rows = mysqli_num_rows($getdata);
	$delete = "DELETE FROM tb_barang WHERE kd_brg ='$kd_brg'";
	$exedelete = mysqli_query($koneksi,$delete);
	$respose = array();
	if($rows > 0)
	{
		if($exedelete)
		{
			$respose['code'] =1;
			$respose['message'] = "Delete Success";
		}
		else
		{
		$respose['code'] =0;
		$respose['message'] = "Failed Delete";
		}
	}
	else
	{
		$respose['code'] =0;
		$respose['message'] = "Failed Delete, data not found";
	}
	
	echo json_encode($respose);

 ?>