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
    <title>Form Tambah Penjualan</title>
    <link rel="stylesheet" href="assets/style4.css">
  </head>

  <body>
    <?php
     require_once 'koneksi.php';
     $query = "SELECT * FROM product ORDER BY id_product DESC";
     $result = mysqli_query($koneksi, $query);
    ?>

    <div class="container">
      <form id="contact" action="add2.php" method="post">
        <h3>Tambah Data Penjualan</h3>

        <fieldset>
          <label for="">Produk</label>
          <br>
          <select name="id_product">
           <?php while($data = mysqli_fetch_assoc($result) ){?>
            <option value="<?php echo $data['id_product']; ?>"><?php echo $data['name']; ?></option>
           <?php } ?>
          </select>
        </fieldset>
        <fieldset>
          <label for="">Size (KG)</label>
          <br>
          <input name="size" type="text" size="10" autocomplete="off">
        </fieldset>
        <fieldset>
          <label for="">Harga Pokok Penjualan (HPP)</label>
          <br>
          <input name="hpp" type="text" size="10" autocomplete="off">
        </fieldset>
        <fieldset>
          <label for="">Kantong</label>
          <br>
          <input type="text" name="kantong" size="10" autocomplete="off">
        </fieldset>
        <fieldset>
          <label for="">Kardus</label>
          <br>
          <input name="kardus" type="text" size="10" autocomplete="off">
        </fieldset>
        <fieldset>
          <label for="">By Susut</label>
          <br>
          <input name="bysusut" type="text" size="10" autocomplete="off">
        </fieldset>
        <fieldset>
          <label for="">Tenaga Kerja Bongkar Muat(TKBM)</label>
          <br>
          <input name="tkbm" type="text" size="10" autocomplete="off">
        </fieldset>
        <fieldset>
          <label for="">By Reward</label>
          <br>
          <input name="byreward" type="text" size="10" autocomplete="off">
        </fieldset>
        <fieldset>
          <label for="">PPN 10%</label>
          <br>
          <input name="ppn" type="text" size="10" autocomplete="off">
        </fieldset>
        <fieldset>
          <label for="">Lokasi</label>
          <br>
          <select name="lokasi">
            <?php $options = array('Aceh', 'Bali', 'Banten', 'Bengkulu', 'Gorontalo', 'Jakarta', 'Jambi', 'Jawa Barat', 'Jawa Tengah', 'Jawa Timur', 'Kalimantan Barat', 'Kalimantan Selatan', 'Kalimantan Tengah',
             'Kalimantan Timur', 'Kalimantan Utara', 'Kep. Bangka Belitung', 'Kep. Riau', 'Lampung', 'Maluku', 'Maluku Utara', 'Nusa Tenggara Barat', 'Nusa Tenggara Timur', 'Papua', 'Papua Barat', 'Riau',
             'Sulawesi Barat', 'Sulawesi Selatan', 'Sulawesi Tengah', 'Sulawesi Tenggara', 'Sulawesi Utara', 'Sumatra Barat', 'Sumatra Selatan', 'Sumatera Utara', 'Yogyakarta', 'Teluk Cendrawasih');
            foreach ($options as $lokasi){
              $selected = @$_GET['lokasi'] == $lokasi ? 'selected="selected"' : '';
              echo '<option value = "'. $lokasi . '"' . $lokasi . '>' . $lokasi . '</option>';
            }
             ?>
          </select>
        </fieldset>
        <fieldset>
          <label for="">Transportasi</label>
          <br>
          <select name="transportasi">
            <?php $options = array('Darat', 'Darat - Air', 'Darat - Udara');
            foreach ($options as $transportasi){
              $selected = @$_GET['transportasi'] == $transportasi ? 'selected="selected"' : '';
              echo '<option value = "'. $transportasi . '"' . $transportasi . '>' . $transportasi . '</option>';
            }
             ?>
          </select>
        </fieldset>
        <fieldset>
          <label for="">Biaya Transportasi</label>
          <br>
          <input name="biayatransport" type="text" size="50" autocomplete="off">
        </fieldset>

        <fieldset>
          <button name="ttambah" type="submit" value="Login" class="Button3">Tambah</button>
        </fieldset>

      </form>
    </div>
  </body>
</html>
