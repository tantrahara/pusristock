<?php
    include "koneksi.php";

    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username'"));
    if ($cek > 0) {
        echo"<script>alert('data sudah ada');
        window.location='index.php'</script>";
    }else{
        $sql= "INSERT INTO admin (username, password) VALUE ('$username', '$password')";
        $query = mysqli_query($koneksi, $sql);

        if( $query ) {
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header("Location: index.php?pesan=sukses");
        } else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
            header("Location: index.php?pesan=gagal");
        }
    }
?>
