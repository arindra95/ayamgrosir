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
	
	Detail Transaksi : <?php if (isset($n)){echo $n->nopembelian;}?>
</h2>
<h2 style="text-align: center"> 
	Nama : <?php if (isset($n)){echo $n->nama_supp;}?>
</h2>
<h2 style="text-align: center"> 
	Tanggal :  <?php if (isset($n)){echo $n->tanggal;}?>
</h2>
<table class=table cellspacing=0>
	<thead>
		<tr>
	
			<th width=10 align=center>No</th>
			<th >Jenis Ayam</th>";
			<th style='text-align: center' width='100'>Jenis Ayam</th>
			<th style='text-align: right' >Total Ekor</th>
			<th style='text-align: right'>Total Berat (Kg)</th>
		
		</tr>
	</thead>
	
	<tbody>
	

			<?php foreach ($np as $row){
			$nomer++;
			echo"<td align=center>".$nomer	."</td>";
			echo"<td >".$row->kodeayam."</td>";
			echo"<td align=center>".$row->jenis."</td>";
			echo"<td align=right>" .$row->totalekor. "</td>";
			echo"<td align=right>" .$row->totalberat."</td>";
			}
			?>		
	
		
	</tbody>
	
	<tfoot>
		<tr>
			<?php if (isset($n)){
				echo"<td colspan=4 align=right>Total Harga:</td>";
				echo"<td align=right>" .$n->harga."</td>";
			}?>
		</tr>
		<tr>
		
			<?php if (isset($n)){
				echo"<td colspan=4 align=right>Jumlah Bayar:</td>";
				echo"<td align=right>" .$n->bayar."</td>";
			}?>
		</tr>
	</tfoot>
	
</table>

	<p style="text-align: center" class=hidden-print>
<button type=button onclick="window.history.back(-1)">Kembali ke halaman sebelumnya</button>
</p>

</body>
</html>