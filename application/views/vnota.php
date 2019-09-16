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
	
	Detail Transaksi : <?php if (isset($not)){echo $not->noinvoice;}?>
</h2>
<h2 style="text-align: center"> 
	Nama :  <?php if (isset($not)){echo $not->nama;}?>
</h2>
<h2 style="text-align: center"> 
	Tanggal :  <?php if (isset($not)){echo $not->tanggal;}?>
</h2>
<table class=table cellspacing=0>
	<thead>
		<tr>
		

			<th width=10 align=center>No</th>
			<th >Kode Ayam</th>
			<th >Jenis Ayam</th>
			<th style="text-align: center" width=100>Ekor</th>
			<th style="text-align: center">Kilogram (Kg)</th>
			<th style="text-align: center">Harga Satuan</th>
			<th style="text-align: right">Potongan</th>
			<th style="text-align: right">Jumlah (Rp)</th>
			
		</tr>
	</thead>
	
	<tbody>
	

			<?php foreach ($nota as $row){
			$nomer++;
			echo "<tr>";
			echo"<td align=center>".$nomer."</td>";	
			echo"<td >".$row->kodeayam."</td>";
			echo"<td >".$row->jenis."</td>";
			echo"<td align=center>" .$row->ekor. "</td>";
			echo"<td align=center>" .$row->berat."</td>";
			echo"<td align=center>" .$row->hargakiloan."</td>";
			echo"<td align=right>" .$row->potongan. "</td>";
			echo"<td align=right>".$row->total."</td>";
			echo "</tr>";
			}
			?>
		
	</tbody>
	
	<tfoot>
		<tr>

			<?php  if (isset($not)){
				echo"<td colspan=7 align=right>Total Harga:</td>";
				echo"<td align=right>" .$not->totalharga."</td>";
			}?>
		</tr>
		<tr>
			<?php if (isset($not)){
				echo"<td colspan=7 align=right>Jumlah Bayar:</td>";
				echo"<td align=right>" .$not->bayar."</td>";
			}?>
		</tr>
	</tfoot>
	
</table>

	<p style="text-align: center" class=hidden-print>
<button type=button onclick="window.history.back(-1)">Kembali ke halaman sebelumnya</button>
</p>

</body>
</html>