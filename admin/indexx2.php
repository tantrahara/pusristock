<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Tabel Penjualan</title>
  <link rel="stylesheet" type="text/css" href="../assets/style5.css">
</head>

<body>
  <!-- Cek Status Login -->
  <?php
    session_start();

    if ($_SESSION['status'] != "login") {
      header("location:../index.php?pesan=belum_login");
    }
  ?>
  <!-- /Cek Status Login -->

  <!-- Konek Database -->
  <?php
    include "../koneksi.php";

    // ambil data untuk table
    $query = mysqli_query($koneksi, "SELECT id_price, name, size, hpp, kantong, kardus, bysusut, tkbm, byreward, ppn, lokasi, transportasi, biayatransport FROM price INNER JOIN product ON price.id_product=product.id_product ORDER BY id_price");

    // untuk pencarian
    if (isset($_POST['cari'])) {
      $cari = $_POST['keyword'];

      $query = mysqli_query($koneksi, "SELECT id_price, name, size, hpp, kantong, kardus, bysusut, tkbm, byreward, ppn, lokasi, transportasi, biayatransport FROM price INNER JOIN product ON price.id_product=product.id_product WHERE name LIKE '%$cari%' OR lokasi LIKE '%$cari%'");
    }
  ?>
  <!-- /Konek Database -->

  <!-- Navbar -->
    <div class="tab_menu">
      <ul class="topnev">
        <li > <a href="tableproduct.php">Table Produk</a> </li>
        <li class="rightNav"> <a href="logout.php">LOGOUT</a> </li>
      </ul>
    </div>
  <!-- Akhir Navbar -->

  <!-- Jumbotron -->
  <div class="head">
    <h2>Asumsi Perhitungan Harga Jual</h2>
  </div>
  <!-- Akhir Jumbotron -->

  <!-- Main -->
  <div class="isi">
    <a href="../formtambahpenjualan.php">Tambah Data</a> <br>

    <form action="" method="post">
      <br> <label for="">Pencarian</label> <br>
      <input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian" autocomplete="off">
      <button type="submit" name="cari">Cari</button>
    </form>
  </div>

  <table>
    <thead>
      <tr>
        <th>Nama Produk</th>
        <th>Size (KG)</th>
        <th>Harga Pokok Penjualan</th>
        <th>Kantong</th>
        <th>Kardus</th>
        <th>By Susut</th>
        <th>TKBM</th>
        <th>By Reward</th>
        <th>PPN 10%</th>
        <th>Lokasi</th>
        <th>Transportasi</th>
        <th>Biaya Transportasi</th>
        <th>Status</th>
      </tr>
    </thead>
    <?php if (mysqli_num_rows($query) > 0) { ?>
      <?php
      while ($data = mysqli_fetch_array($query)) {
      ?>
        <tbody>
          <tr>
            <td><?php echo $data["name"]; ?></td>
            <td><?php echo $data["size"]; ?>KG</td>
            <td>Rp.<?php echo number_format($data["hpp"]); ?></td>
            <td>Rp.<?php echo number_format($data["kantong"]); ?></td>
            <td>Rp.<?php echo number_format($data["kardus"]); ?></td>
            <td>Rp.<?php echo number_format($data["bysusut"]); ?></td>
            <td>Rp.<?php echo number_format($data["tkbm"]); ?></td>
            <td>Rp.<?php echo number_format($data["byreward"]); ?></td>
            <td>Rp.<?php echo number_format($data["ppn"]); ?></td>
            <td><?php echo $data["lokasi"]; ?></td>
            <td><?php echo $data["transportasi"]; ?></td>
            <td>Rp.<?php echo number_format($data["biayatransport"]); ?></td>
            <td><a href="../hapus2.php?id_price=<?php echo $data['id_price']; ?>">Hapus</a> </td>
          </tr>
        <?php } ?>
      <?php } ?>
        </tbody>
  </table>
  <!-- Akhir Main -->

</body>

</html>