<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registrasi</title>
    <link rel="stylesheet" href="assets/style4.css">
  </head>
  
  <body>
    <div class="container">
      <form id="contact" action="registrasi.php" method="post">
        <h3>Registrasi</h3>

        <fieldset>
          <label for="">Username</label>
          <input placeholder="Masukan Username Baru" type="text" name="username" tabindex="1" required autofocus>
        </fieldset>
        <fieldset>
          <label for="">Password</label>
          <input placeholder="Masukan Password Baru" type="text" name="password" tabindex="2" required>
        </fieldset>

        <fieldset>
          <button name="Submit" type="submit" value="Login" class="Button3">Daftar</button>
        </fieldset>

      </form>
    </div>
  </body>
</html>
