<div class='container'>
<h1>Tambah Data</h1>
<form action="kwu-tambah.php" method="POST">
    <label for="kodebarang">Kode Barang  : </label>
    <input class="form-control" type="number" name="kodebarang" placeholder="Ex. 001" /> <br>

    <label for="tanggal">Tanggal  : </label>
    <input class="form-control" type="date" name="tanggal" /><br>
    
    <label for="pembeli">Pembeli :</label>
    <input class="form-control" type="text" name="pembeli" placeholder="Ex. zero" /><br>

    <label for="namabarang">Nama Barang :</label>
    <input class="form-control" type="text" name="namabarang" placeholder="Ex. Elektronik"><br>

    <label for="qty">QTY :</label>
    <input class="form-control" type="number" name="qty" placeholder="Ex. "><br>

    <label for="hargabeli">Harga Beli :</label>
    <input class="form-control" type="number" name="hargabeli" placeholder="Ex. "><br>

    <label for="hargajual">Harga Jual :</label>
    <input class="form-control" type="number" name="hargajual" placeholder="Ex. "><br>

    <input class='btn btn-sm btn-success' type="submit" name="simpan" value="Simpan Data" /> 
    <a class='btn btn-sm btn-secondary' href="kwu.php">Kembali</a>
</form>

<?php
    include ('./kwu-config.php');
    if ($_SESSION["login"] != TRUE) {
        header('location:login.php');
    }
    
    if ($_SESSION["role"] != "admin") {
        echo "
        <script>
             alert('Akses tidak diberikan, kamu bukan admin');
             window.location='kwu.php';
             </script>
        ";
        }

    if( isset($_POST["simpan"]) ){
        $kodebarang = $_POST["kodebarang"];
        $tanggal = $_POST["tanggal"];
        $pembeli = $_POST["pembeli"];
        $namabarang = $_POST["namabarang"];
        $qty = $_POST["qty"];
        $hargabeli = $_POST["hargabeli"];
        $hargajual = $_POST["hargajual"];

        // CREATE - Menambahkan Data ke Database
        $query = "
                INSERT INTO transaksi VALUES
                ('$kodebarang', '$tanggal', '$pembeli', '$namabarang', '$qty', '$hargabeli', '$hargajual');
            ";

            include ('./kwu-config.php');
            $insert = mysqli_query($mysqli, $query);

            if ($insert){
                echo "
                    <script>
                            alert('Data berhasil ditambahkan');
                            window.location='kwu.php';
                    </script>
                ";
            }
    }
?>