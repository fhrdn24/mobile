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
	header("Content-Disposition: attachment; filename=Data Barang.xls");
	?>

	<center>
		<h1>Data Barang <br/> Toko Anggrek</h1>
	</center>

	<table border="1">
		<tr>
			<th>kd_brg</th>
			<th>nm_brg</th>
			<th>satuan</th>
			<th>harga</th>
			<th>harga_beli</th>
			<th>stok</th>
			<th>stok_min</th>
			<th>gambar</th>
		</tr>
		<?php 
		// koneksi database
		$koneksi = mysqli_connect("localhost","root","","penjualan1");

		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"select * from tb_barang");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $d['kd_brg']; ?></td>
			<td><?php echo $d['nm_brg']; ?></td>
			<td><?php echo $d['satuan']; ?></td>
			<td><?php echo $d['harga']; ?></td>
			<td><?php echo $d['harga_beli']; ?></td>
			<td><?php echo $d['stok']; ?></td>
			<td><?php echo $d['stok_min']; ?></td>
			<td><?php echo $d['gambar']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>
</body>
</html>