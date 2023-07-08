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
    <title>Form Tambah Produk</title>
    <link rel="stylesheet" href="assets/style4.css">
  </head>

  <body>
    <div class="container">
      <form id="contact" action="addprod.php" method="post">
        <h3>Tambah Data Produk</h3>

        <fieldset>
          <label for="">Nama Produk</label>
          <br>
          <input name="produk" type="text" size="10" autocomplete="off">
        </fieldset>
        <fieldset>
          <button name="ttambah" type="submit" value="Login" class="Button3">Tambah</button>
        </fieldset>

      </form>
    </div>
  </body>
</html>
