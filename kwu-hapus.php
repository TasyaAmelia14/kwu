<?php
include ('./kwu-config.php');
if ($_SESSION["login"] != TRUE) {
    header('location:kwu.php');


}
if ($_SESSION["role"] != "admin") {
    echo "
    <script>
         alert('Akses tidak diberikan, kamu bukan admin');
         window.location='kwu.php';
         </script>
    ";
    }

if(isset($_GET["kode_barang"]) && $_SESSION["role"] == "admin"){
    $kodebarang = $_GET["kodebarang"];

    $query = "
     DELETE FROM transaksi
     WHERE kodebarang = '$kodebarang';
    ";

    
    $update = mysqli_query($mysqli, $query);

    if($update){
        echo "
        <script>
        alert('Data berhasil dihapus');
        window.location='kwu.php';
        </script>
        ";
    }
}
?>

