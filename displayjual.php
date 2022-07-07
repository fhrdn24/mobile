<?php
date_default_timezone_set('Asia/Jakarta');
	include "koneksi_ip.php"
?>
<HTML>
<HEAD>
<TITLE>Menampilkan Daftar Penjualan</TITLE>

<script language="javascript">
function tanya() {
if (confirm ("Apakah Anda yakin akan menghapus barang ini ?")) {
	return true;
} else {
	return false;
}
}
</script>
</HEAD>
<BODY>
<center>
		<a target="_blank" href="export_excelpenjualan.php">EXPORT KE EXCEL</a>
	</center>
<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Transactions</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index_admin.php">Home</a></li>
						<li><i class="fa fa-laptop"></i>Penjualan</li>						  	
					</ol>
				</div>
			</div>              
			  <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Daftar Penjualan
                          </header>
                          <form name="cari" method="POST">
							Tanggal : <input type="date" name="tgl1" > s/d <input type="date" name="tgl2">
							<input type="submit" name="cari" value="cari">
						  </form>
                          <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th><i class="icon_profile"></i> No. Nota</th>
                                 <th><i class="icon_mail_alt"></i> Tgl. Jual</th>
                                 <th><i class="icon_pin_alt"></i> Total Biaya</th>
                                 <th><i class="icon_mobile"></i> Pembayaran</th>
								 <th><i class="icon_calendar"></i> Kembalian</th>
								 <th><i class="icon_calendar"></i> Status</th>
							
                                 <th><i class="icon_cogs"></i> Action</th>
                              </tr>



<?php
if(isset($_POST["cari"]))
{	//date('Y-m-d', strtotime($tanggal))
	$tgl1=date('Y-m-d',strtotime($_POST["tgl1"]));
	$tgl2=date('Y-m-d',strtotime($_POST["tgl2"]));
	//echo "$tgl1";
	$query = "SELECT * FROM mjual where date(tgl_jual)>=date('$tgl1') and date(tgl_jual)<=date('$tgl2') order by tgl_jual desc";
	if($tgl1=="1970-01-01")
	{
		$query = "SELECT * FROM mjual order by tgl_jual desc";
	}
}
	else
	{
    $query = "SELECT * FROM mjual order by tgl_jual desc";
	}
  $sql = mysqli_query ($conn,$query);
  //echo "<a href='tambahbarang.php'>Add</a>";
  while ($hasil = mysqli_fetch_array ($sql)) {

		$no_nota = $hasil['no_nota'];
		$tgl_jual = $hasil['tgl_jual'];
		$total_biaya = $hasil['total_biaya'];
		$pembayaran= $hasil['pembayaran'];
		$kembalian = $hasil['kembalian'];
		$status = $hasil['status'];
		
	//tampilkan barang
		echo "<tr>
		<td align='center'>$no_nota</td>
		<td align='left' >$tgl_jual</td>
		<td align='left'>$total_biaya</td>
		<td align='right'>$pembayaran</td>
		<td align='right'>$kembalian</td>
		<td align='right'>$status</td>";
		?>
		<td>
		                          <div class="btn-group">
                                      <a class="btn btn-primary" href="<?php echo "index_admin.php?page=tambahbarang"?>"><i class="icon_plus_alt2"></i></a>
                                      <a class="btn btn-success" href="<?php echo "index_admin.php?page=editbarang&id=$kode"?>"><i class="icon_check_alt2"></i></a>
                                      <a class="btn btn-danger" onClick='return tanya()' href="<?php echo "index_admin.php?page=hapusbarang&id=$kode"?>"><i class="icon_close_alt2"></i></a>
                                  </div>
                                  </td>
                              </tr>
	        <?php } ?>
		</tbody>
                        </table>
                      </section>
                  </div>
              </div>
		
		
</BODY>
</HTML>
