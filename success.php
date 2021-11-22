<?php
session_start();
$nama_user = $_SESSION['nama_user'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Halaman Successfull Login</title>
  </head>
  <body>
    <header>
        <div class="header" id="header">
            <div id="header_caption">
                <h1>Succesfully Login! Welcome <?php echo $nama_user ?></h1>
                <p>We did it! :))</p>
            </div>
        </div>
    </header>
  </body>
</html>