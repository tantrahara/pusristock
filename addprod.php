<?php
  include('koneksi.php');
  if(isset($_POST['ttambah'])){ //['ttambah'] merupakan name dari button di form tambah
    $produk = $_POST['produk'];

    if (empty($produk)) {
      echo "<script>alert('Input Data Kosong');history.go(-1);</script>";
    }
    if (!empty($produk)) {
      $cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM product WHERE name='$produk'"));
      if ($cek > 0) {
        echo"<script>alert('data sudah ada');
        window.location='admin/tableproduct.php'</script>";
      }else {
        $sql= "INSERT INTO product (name) VALUE ('$produk')";
        $query	= mysqli_query($koneksi,$sql);

        if($query){
          header('location: admin/tableproduct.php'); //kode ini supaya jika data setelah ditambahkan form kembali menuju tabel data siswa
        }
        else{
          echo 'Gagal';
        }
      }
    }
  }
?>
