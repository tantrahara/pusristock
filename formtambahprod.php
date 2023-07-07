<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Form Tambah Produk</title>
    <link rel="stylesheet" href="assets/style4.css">
  </head>

  <body>
    <?php
      session_start();
      if($_SESSION['status']!="login"){
        header("location:index.php?pesan=belum_login");
      }
    ?>

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
