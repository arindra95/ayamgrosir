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

    <b></b><br /><br />
    
  <table border="1" cellpadding="8">


        
            <tr>
              <th class='' width='50'>No</th>
                <th width=100>No Invoice</th>
                <th width=100>Tanggal</th>
                <th width=100>Ekor</th>
               <th width=100>Berat</th>
                <th width=100>Total</th>
            </tr>
   
 <?php
                  if( ! empty($penjualan)){
                   $no = 1;
                    foreach($penjualan as $data){
                      $tgl = date('d-m-Y', strtotime($data->tanggal));
            
                    echo "<tr>";
                    echo "<td>".$no."</td>";
                    echo "<td>".$tgl."</td>";
                    echo "<td>".$data->noinvoice."</td>";
                    echo "<td>".$data->totalekor."</td>";
                    echo "<td>".$data->totalberat."</td>";
                    echo "<td>".$data->totalharga."</td>";
                    echo "<td colspan=4 align=right>Total Penjualan </td>";
                    echo "<td align=right>".$data->totp."</td>";
                    echo "</tr>";
                    $no++;
                      }
                  }
                ?>
 
  </table>
</body>
</html>
