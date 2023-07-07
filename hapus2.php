<?php
    // koneksi database
    include 'koneksi.php';

    // menangkap data id yang di kirim dari url
    $id = $_GET['id_price'];


    // menghapus data dari database
    mysqli_query($koneksi,"delete from price where id_price='$id'");

    // mengalihkan halaman kembali ke index.php
    header("location:admin/indexx2.php");
?>
