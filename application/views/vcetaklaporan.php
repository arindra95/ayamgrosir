<!DOCTYPE html>
<html>
<head>
	<title>Detail transaksi</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/nota.css">

	
</head>
<body onload="window.print()">
	<?php echo"<p>".$tgl."</p>";?>
<div class=kop-toko>
	<h1>Ayam Grosir MBENDANG</h1>
	<p>penyalur ayam</p>
</div>
<h2 style="text-align: center">
 <?php 
    if( ! empty($transaksi)){
    echo"<b>".$ket."</b><br /><br />"; }?>
<?php 
    if( ! empty($pembelian)){
    echo"<b>".$ket."</b><br /><br />"; }?>

<?php 
    if( ! empty($kasharian)){
    echo"<b>".$ket."</b><br /><br />"; }?>
</h2>
<table class=table cellspacing=0>
	<thead>
	
			<?php   if( ! empty($transaksi)){
				echo"<tr>";
				echo"<th width=10 align=center>No</th>";
            	echo"<th width=100>No Invoice</th>";
            	echo"<th width=100>Tanggal</th>";
            	echo"<th width=100>Ekor</th>";
            	echo"<th width=100>Berat</th>";
            	echo"<th width=100>Total</th>";
			}
			?>

			<?php   if( ! empty($pembelian)){
				echo"<th width=10 align=center>No</th>";
            	echo"<th width=100>No Invoice Pembelian</th>";
            	echo"<th width=100>Tanggal</th>";
            	echo"<th width=100>Ekor</th>";
            	echo"<th width=100>Berat</th>";
            	echo"<th width=100>Total</th>";
			}
			?>

			<?php   if( ! empty($kasharian)){
				echo"<tr>";
				echo"<th width=10 align=center>No</th>";
            	echo"<th width=100>No Invoice</th>";
            	echo"<th width=100>Tanggal Transaksi</th>";
            	echo"<th width=100>Tanggal Pembayaran</th>";
            	echo"<th width=100>Ekor</th>";
            	echo"<th width=100>Berat</th>";
            	echo"<th width=100>Total</th>";
			}
			?>
	</thead>
	
	<tbody>
	
		

			<?php 
			  if( ! empty($transaksi)){
			  	 $no = 1;
			foreach ($transaksi as $data){
					
			 		$tgl = date('d-m-Y', strtotime($data->tanggal));
			 		echo"<tr>";
                    echo "<td>".$no."</td>";
                    echo "<td>".$data->noinvoice."</td>";
                    echo "<td>".$data->tanggal."</td>";
                    echo "<td>".$data->totalekor."</td>";
                    echo "<td>".$data->totalberat."</td>";
                    echo "<td class=uang-indo>".$data->totalharga."</td>";
                    echo"</tr>";
                     $no++;
				}
			}
			?>

			<?php 

			 if( ! empty($pembelian)){
			  	 $no = 1;

			foreach ($pembelian as $data){
					echo"<tr>";
					echo"<td align=center>".$no."</td>";
				  	echo "<td>".$data->nopembelian."</td>";
                    echo "<td>".$data->tanggal."</td>";
                    echo "<td>".$data->totalekor."</td>";
                    echo "<td>".$data->totalberat."</td>";
                    echo "<td >".$data->harga."</td>";
                     echo"</tr>";
				$no++;
				}
			}
			?>

			<?php 

			 if( ! empty($kasharian)){
			  	 $no = 1;

			foreach ($kasharian as $data){
					echo"<tr>";
					echo"<td align=center>".$no."</td>";
				  	echo "<td>".$data->noinvoice."</td>";
				  	echo "<td>".$data->tanggal."</td>";
                    echo "<td>".$data->tgl_pembayaran."</td>";
                    echo "<td>".$data->totalekor."</td>";
                    echo "<td>".$data->totalberat."</td>";
                    echo "<td >".$data->bayar."</td>";
                     echo"</tr>";
				$no++;
				}
			}
			?>				
		
	</tbody>
	
	<tfoot>
			<?php 
				 if( ! empty($transaksi)){
				foreach ($total as $row){
					echo"<tr>";
				echo"<td colspan=5 align=right>Total Penjualan:</td>";
				echo"<td align=right>" .$row->total."</td>";
				echo"</tr>";
			}
			}	?>
			<?php 

				 if( ! empty($pembelian)){
				foreach ($total as $row){
					echo"<tr>";
				echo"<td colspan=5 align=right>Total Pembelian:</td>";
				echo"<td align=right>" .$row->total."</td>";
				echo"</tr>";
			}
			}	?>

			<?php 

				 if( ! empty($kasharian)){
				foreach ($total as $row){
					echo"<tr>";
				echo"<td colspan=6 align=right>Total Penerimaan Kas:</td>";
				echo"<td align=right>" .$row->total."</td>";
				echo"</tr>";
			}
			}	?>

	</tfoot>
</table>

	<p style="text-align: center" class=hidden-print>
<button type=button onclick="window.history.back(-1)">Kembali ke halaman sebelumnya</button>
</p>

</body>
</html>