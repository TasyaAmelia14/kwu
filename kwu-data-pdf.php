<?php
    require_once __DIR__ . '/vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf();
    include('./kwu-config.php');
    $no = 1;
    $tabledata = "";
    $data = mysqli_query($mysqli, "SELECT * FROM transaksi ");
    while($row =mysqli_fetch_array($data)){
        $totalhargabeli = ($row["qty"]*$row["hargabeli"]);
        $totalhargajual = ($row["qty"]*$row["hargajual"]);
        $laba = ($totalhargajual-$totalhargabeli);
        $tabledata .= "
        <tr>
        <td>".$row["kodebarang"]."</td>
                        <td>".$row["tanggal"]."</td>
                        <td>".$row["pembeli"]."</td>
                        <td>".$row["namabarang"]."</td>
                        <td>".$row["qty"]."</td>
                        <td>".$row["hargabeli"]."</td>
                        <td>".$row["hargajual"]."</td>
                        <td>".$totalhargabeli."</td>
                        <td>".$totalhargajual."</td>
                        <td>".$laba."</td>
        </tr>
        ";
        $no++;
     }
    
        $tanggal_cetak = date('d M Y - H:i:s');
        $table = "
            <h1>Laporan Data kwu</h1>
            <h6>Waktu Cetak : $tanggal_cetak</h6>
            <table width='100%' cellpadding=5 border=1 cellspacing=0>
                <tr>
                        <th>kodebarang</th>
                        <th>tanggal</th>
                        <th>pembeli</th>
                        <th>namabarang</th>
                        <th>qty</th>
                        <th>hargabeli</th>
                        <th>hargajual</th>
                        <th>totalhargabeli</th>
                        <th>totalhargajual</th>
                        <th>laba</th> 
                </tr>
                $tabledata
            </table>
        ";

    $mpdf->WriteHTML($table);
    $mpdf->Output();
?>
