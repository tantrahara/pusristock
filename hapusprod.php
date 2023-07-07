<?php
    // koneksi database
    include 'koneksi.php';

    // menangkap data id yang di kirim dari url
    $id = $_GET['id_product'];


    // menghapus data dari database
    mysqli_query($koneksi,"delete from product where id_product='$id'");

    // mengalihkan halaman kembali ke index.php
    header("location:admin/tableproduct.php");
?>
