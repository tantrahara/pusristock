<?php
    // cek login
    session_start();
    /* 
      Dari chatGPT :
        "session_start()" harus dipanggil di paling awal code (sebelum tag - tag html). karena function ini harus dipanggil sebelum ada output ke browser (tag - tag html dianggap output). 
    */
    
    if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
      header("location:../index.php?pesan=belum_login");
      exit(); // menyetopkan code selanjutnya
    }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Data Produk</title>
    <link rel="stylesheet" type="text/css" href="../assets/style5.css">
    
  </head>

  <body>
    <!-- Konek Database -->
    <?php
      include "../koneksi.php";

      // ambil data untuk table
      $query = mysqli_query($koneksi,"SELECT * FROM product ORDER BY id_product");

      // untuk pencarian
      if (isset($_POST['cari'])) {
        $cari = $_POST['keyword'];
        $query = mysqli_query($koneksi, "SELECT * FROM product WHERE name LIKE '%$cari%'");
      }
    ?>
    <!-- /Konek Database -->

    <!-- Navbar -->
    <div class="tab_menu">
      <ul class="topnev">
        <li> <a href="indexx2.php">Table Harga</a> </li>
        <li class="rightNav"> <a href="logout.php">LOGOUT</a> </li>
      </ul>
    </div>
    <!-- Akhir Navbar -->

    <!-- Jumbotron -->
    <div class="head">
      <h2>Data Produk</h2>
    </div>
    <!-- Akhir Jumbotron -->

    <!-- Main -->
    <div class="isi">
     <a href="../formtambahprod.php">Tambah Produk</a> <br>

     <form action="" method="post">
       <br> <label for="">Pencarian</label> <br>
       <input type="text" name="keyword" size="40" autofocus
       placeholder="masukan keyword pencarian" autocomplete="off">
       <button type="submit" name="cari">Cari</button>
     </form>
    </div>

    <div align=center>
      <table>
        <thead>
          <tr>
            <th>Nama Produk</th>
            <th>Status</th>
          </tr>
        </thead>
        <?php if(mysqli_num_rows($query)>0) { ?>
        <?php
             while($data = mysqli_fetch_array($query)){
        ?>
        <tbody>
          <tr>
            <td><?php echo $data["name"]; ?></td>
            <td><a href="../hapusprod.php?id_product=<?php echo $data['id_product']; ?>">Hapus</a> </td>
          </tr>
          <?php } ?>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!-- Akhir Main -->

  </body>

</html>
