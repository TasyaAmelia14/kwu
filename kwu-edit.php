<?php
    if ( isset($_GET["kodebarang"]) ){
        $kodebarang = $_GET["kodebarang"];
        $check_kodebarang = "SELECT * FROM transaksi WHERE kodebarang = '$kodebarang';";
        include('./kwu-config.php');
        $querry = mysqli_query($mysqli, $check_kodebarang);
        $row = mysqli_fetch_array($querry);
    }
?>

<div class="container">
<h1>Edit Data</h1>
<form action="kwu-edit.php" method="POST">
    <label for="kodebarang">Kode Barang  : </label>
    <input class="form-control"value="<?php echo $row["kodebarang"]; ?>" type="number" name="kodebarang" placeholder="Ex. 001" /> <br>

    <label for="tanggal">Tanggal  : </label>
    <input class="form-control"value="<?php echo $row["tanggal"]; ?>"type="date" name="tanggal" /><br>
    
    <label for="pembeli">Pembeli :</label>
    <input class="form-control"value="<?php echo $row["pembeli"]; ?>"type="text" name="pembeli" placeholder="Ex. zero" /><br>

    <label for="namabarang">Nama Barang :</label>
    <input class="form-control"value="<?php echo $row["namabarang"]; ?>"type="text" name="namabarang" placeholder="Ex. Elektronik"><br>

    <label for="qty">QTY :</label>
    <input class="form-control"value="<?php echo $row["qty"]; ?>"type="number" name="qty" placeholder="Ex. "><br>

    <label for="hargabeli">Harga Beli :</label>
    <input class="form-control"value="<?php echo $row["hargabeli"]; ?>"type="number" name="hargabeli" placeholder="Ex. "><br>

    <label for="hargajual">Harga Jual :</label>
    <input class="form-control"value="<?php echo $row["hargajual"]; ?>"type="number" name="hargajual" placeholder="Ex. "><br>

    <input class='btn btn-sm btn-success' type="submit" name="simpan" value="Simpan Data" /> 
    <a class='btn btn-sm btn-secondary' href="kwu.php">Kembali</a>
</form>

<?php
    if( isset($_POST["simpan"]) ){
        $kodebarang = $_POST["kodebarang"];
        $tanggal = $_POST["tanggal"];
        $pembeli = $_POST["pembeli"];
        $namabarang = $_POST["namabarang"];
        $qty = $_POST["qty"];
        $hargabeli = $_POST["hargabeli"];
        $hargajual = $_POST["hargajual"];

        //Edit - Memperbarui Data 
        $query ="
            UPDATE transaksi SET 
                tanggal = '$tanggal',
                pembeli = '$pembeli',
                namabarang = '$namabarang',
                qty = '$qty',
                hargabeli = '$hargabeli',
                hargajual = '$hargajual'
            WHERE kodebarang = '$kodebarang';
        ";
        include ('./kwu-config.php');
        $update = mysqli_query($mysqli, $query);

        if($update){
            echo "
                <script>
                    alert('Data Berhasil Diperbaharui');
                    window.location='kwu.php';
                </script>
            ";
        }else{
            echo "
            <script>
                alert('Data Gagal diperbaharui');
                window.location='kwu-edit.php?kodebarang=$kodebarang';
            </script>
            ";
        }
    }
?>