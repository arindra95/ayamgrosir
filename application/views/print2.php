<html>
<head>
  <title>Cetak Laporan</title>
  <style>
    table {
      border-collapse:collapse;
      table-layout:fixed;width: 630px;
    }
    table td {
      word-wrap:break-word;
      width: 20%;
    }
  </style>
</head>
<body>
  <?php 
    if( ! empty($transaksi)){
    echo"<b>".$ket."</b><br /><br />"; }?>

  <?php 
    if( ! empty($pembelian)){
    echo"<b>".$ket."</b><br /><br />"; }?>
    
  <table class="table" border="1" cellpadding="1">

<?php
                  if( ! empty($transaksi)){
        
            echo"<tr>";
                echo"<th class='' width='50'>No</th>";
                echo"<th width=100>No Invoice</th>";
                echo"<th width=100>Tanggal</th>";
                echo"<th width=100>Ekor</th>";
                echo"<th width=100>Berat</th>";
                echo"<th width=100>Total</th>";
             echo"</tr>";
                  }
                ?>
        <?php
                  if( ! empty($pembelian)){
                     
            echo"<tr>";
                echo"<th class='' width='50'>No</th>";
                echo"<th width=100>No Invoice Pembelian</th>";
                echo"<th width=100>Tanggal</th>";
                echo"<th width=100>Ekor</th>";
                echo"<th width=100>Berat</th>";
                echo"<th width=100>Total</th>";
             echo"</tr>";
                  }
                ?>

                 <?php
                  if( ! empty($kasharian)){
                     
            echo"<tr>";
                echo"<th class='' width='50'>No</th>";
                echo"<th width=100>No Invoice </th>";
                echo"<th width=100>Tanggal Pembayaran</th>";
                echo"<th width=100>Ekor</th>";
                echo"<th width=100>Berat</th>"; 
                echo"<th width=100>Total</th>";
             echo"</tr>";
                  }
                ?>


 <?php
                  if( ! empty($transaksi)){
                   $no = 1;
                    foreach($transaksi as $data){
                      $tgl = date('d-m-Y', strtotime($data->tanggal));
            
                    echo "<tr>";
                    echo "<td>".$no."</td>";
                    echo "<td>".$data->noinvoice."</td>";
                    echo "<td>".$data->tanggal."</td>";
                    
                    echo "<td>".$data->totalekor."</td>";
                    echo "<td>".$data->totalberat."</td>";
                    echo "<td>".$data->totalharga."</td>";
                   
                    echo "</tr>";

                      
                      } 

                    foreach ($total as $row) {
                      
                      echo"<tr>";
                        echo"<td colspan=5 align=right>Total Penjualan (Rp)</td>";
                        echo"<td colspan=1>".$row->total."</td>";
                      echo"</tr>";
                    }
                    $no++;
                      }
                  
                ?>



  <?php
                  if( ! empty($pembelian)){
                   $no = 1;
                    foreach($pembelian as $data){
                      $tgl = date('d-m-Y', strtotime($data->tanggal));
            
                    echo "<tr>";
                    echo "<td>".$no."</td>";
                    echo "<td>".$data->nopembelian."</td>";
                    echo "<td>".$tgl."</td>";
                    echo "<td>".$data->totalekor."</td>";
                    echo "<td>".$data->totalberat."</td>";
                    echo "<td>".$data->harga."</td>";

                    echo "</tr>";
                    
                      }

                       foreach ($total as $row) {
                      
                      echo"<tr>";
                        echo"<td colspan=5 align=right>Total Pembelian (Rp)</td>";
                        echo"<td colspan=1>".$row->total."</td>";
                      echo"</tr>";
                    }
                    $no++;
                  }
                ?>

                 <?php
                  if( ! empty($kasharian)){
                   $no = 1;
                    foreach($kasharian as $data){
                      $tgl = date('d-m-Y', strtotime($data->tanggal));
            
                    echo "<tr>";
                    echo "<td>".$no."</td>";
                    echo "<td>".$data->noinvoice."</td>";
                    echo "<td>".$tgl."</td>";
                    echo "<td>".$data->totalekor."</td>";
                    echo "<td>".$data->totalberat."</td>";
                    echo "<td>".$data->bayar."</td>";

                    echo "</tr>";
                    
                      }

                       foreach ($total as $row) {
                      
                      echo"<tr>";
                        echo"<td colspan=5 align=right>Total Pembelian (Rp)</td>";
                        echo"<td colspan=1>".$row->total."</td>";
                      echo"</tr>";
                    }
                    $no++;
                  }
                ?>
  </table>
</body>
</html>
