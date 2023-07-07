<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="assets/newindexstyle.css">
  </head>

  <body>
  <div class="login-page">
    <div class="form">

      <form method="post" action="cek_login.php" class="login-form">
        <h2>LOGIN</h2>

        <input type="text" name="username" placeholder="username" autocomplete="off"/>
        <input type="password" name="password" placeholder="password"/>
        <button type="submit" value="LOGIN">login</button>

        <br/>

        <?php
        if(isset($_GET['pesan'])){
          if($_GET['pesan'] == "gagal"){
            echo "<span style='color: red;'> Login gagal! username dan password salah!";
          }else if($_GET['pesan'] == "logout"){
            echo "<span style='color: red;'> Anda telah berhasil logout";
          }else if($_GET['pesan'] == "belum_login"){
            echo "<span style='color: red;'> Anda harus login untuk mengakses halaman admin";
          }else if($_GET['pesan'] == "sukses"){
            echo "<span style='color: red;'> Anda telah berhasil registrasi";
          }
        } ?>

        <br>

        <p class="message">Not registered? <a href="registrasiform.php">Create an account</a></p>

      </form>

    </div>
  </div>

  </body>
</html>
