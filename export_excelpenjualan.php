<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Penjualan.xls");
	?>

	<center>
		<h1>Data Penjualan <br/> Toko Anggrek</h1>
	</center>

	<table border="1">
		<tr>
			<th>No_Nota</th>
			<th>Tgl_Jual</th>
			<th>Total_Jual</th>
			<th>Pembayaran</th>
			<th>Kembalian</th>
		</tr>
		<?php 
		// koneksi database
		$koneksi = mysqli_connect("localhost","root","","penjualan1");

		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"select * from mjual");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $d['no_nota']; ?></td>
			<td><?php echo $d['tgl_jual']; ?></td>
			<td><?php echo $d['total_biaya']; ?></td>
			<td><?php echo $d['pembayaran']; ?></td>
			<td><?php echo $d['kembalian']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>