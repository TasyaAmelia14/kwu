<?php
    include('./kwu-config.php');
    if ($_SESSION["login"] != TRUE) {
        header('location:login.php');
    }

    echo "<div class='container'>";
      
          echo "Selamat Datang, " . $_SESSION["username"] . "<br>";
          echo "Anda sebagai : " . $_SESSION["role"];
          echo " - ";
          echo "<a class='btn btn-secondary btn-sm' href='logout.php'>Logout</a>";
          echo " <hr>";
          echo "<a class='btn btn-primary btn-sm' href='kwu-tambah.php'>Tambah Data</a>";
          echo "&nbsp;-&nbsp;";
          echo "<a class='btn btn-warning btn-sm' href='kwu-data-pdf.php'>Download PDF</a>";
          echo "<hr>";

    //Menampilkan data diri database
    $no = 1;
    $tabledata = "";
    $data = mysqli_query($mysqli, "SELECT * FROM transaksi ");
    while($row = mysqli_fetch_array($data)){
        $Total_Harga_Beli=($row["qty"] * $row["hargabeli"]);
        $Total_Harga_Jual=($row["qty"] * $row["hargajual"]);
        $Laba=($Total_Harga_Jual - $Total_Harga_Beli);
        $tabledata .= "
            <tr>
                <td>".$row["kodebarang"]."</td>
                <td>".$row["tanggal"]."</td>
                <td>".$row["pembeli"]."</td>
                <td>".$row["namabarang"]."</td>
                <td>".$row["qty"]."</td>
                <td>".$row["hargabeli"]."</td>
                <td>".$row["hargajual"]."</td>
                <td>".$Total_Harga_Beli."</td>
                <td>".$Total_Harga_Jual."</td>
                <td>".$Laba."</td>
                <td>
                <a input class='btn btn-success btn-sm' href='kwu-edit.php?kodebarang=".$row["kodebarang"]."'>Edit</a>
                &nbsp;-&nbsp;
                <a input class='btn btn-warning btn-sm' href='kwu-hapus.php?kodebarang=".$row["kodebarang"]."' 
                onclick='return confirm(\"Yakin Ingin Hapus ?\");'>Hapus</a>
            </td>
            </tr>
        ";
        $no++;

    }

    echo "
        <table class='table table-striped table-dark'>
            <tr>
            <th>Kode Barang</th>
            <th>Tanggal</th>
            <th>Pembeli</th>
            <th>Nama Barang</th>
            <th>QTY</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Total Harga Beli</th>
            <th>Total Harga Jual</th>
            <th>Laba</th>
            <th>Aksi</th>
            </tr>
            $tabledata
        </table>
    ";
?>