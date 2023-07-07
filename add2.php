<?php
  include('koneksi.php');
  if(isset($_POST['ttambah'])){ //['ttambah'] merupakan name dari button di form tambah
    $id_product = $_POST['id_product'];
    $size = $_POST['size'];
    $hpp	= $_POST['hpp'];
    $kantong	= $_POST['kantong'];
    $kardus	= $_POST['kardus'];
    $bysusut	= $_POST['bysusut'];
    $tkbm	= $_POST['tkbm'];
    $byreward	= $_POST['byreward'];
    $ppn	= $_POST['ppn'];
    $lokasi	= $_POST['lokasi'];
    $transportasi	= $_POST['transportasi'];
    $biayatransport = $_POST['biayatransport'];

    if (empty($size) or empty($hpp) or empty($kantong) or empty($kardus) or empty($bysusut) or empty($tkbm) or empty($byreward) or empty($ppn) or empty($biayatransport)) {
      echo "<script>alert('Input Data Kosong');history.go(-1);</script>";
    }
    if (!empty($size) and !empty($hpp) and !empty($kantong) and !empty($kardus) and !empty($bysusut) and !empty($tkbm) and !empty($byreward) and !empty($ppn) and !empty($biayatransport)) {
      $cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM price WHERE id_product='$id_product' AND size = '$size' AND lokasi = '$lokasi'"));
      if ($cek > 0) {
        echo"<script>alert('data Sudah ada');
        window.location='admin/indexx2.php'</script>";
      }else{

        $sql= "INSERT INTO price (id_product, size ,hpp, kantong, kardus, bysusut, tkbm, byreward, ppn, lokasi, transportasi, biayatransport) VALUE
        ('$id_product', '$size', '$hpp', '$kantong', '$kardus', '$bysusut', '$tkbm', '$byreward', '$ppn', '$lokasi', '$transportasi', '$biayatransport')";
        $query	= mysqli_query($koneksi,$sql);

        if($query){
          header('location: admin/indexx2.php'); //kode ini supaya jika data setelah ditambahkan form kembali menuju tabel data siswa
        }
        else{
          echo 'Gagal';
        }
      }
    }
  }
?>
