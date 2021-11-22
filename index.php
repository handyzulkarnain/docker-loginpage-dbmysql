<?php 
session_start();

$db_host = 'mysql';
$db_user = 'root';
$db_pass = 'secret';
$db_name = 'db_user';
$db_port = 3306;

$con = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port) or
    die('<body style="font-family: arial;"><div style="padding: 20px;border:dotted 1px gray;color: #f44336;"><b>ERROR !</b><small> Server Connection Lost,'.mysqli_connect_error().'</small></div></body>');

if(isset($_POST["username"]) AND isset($_POST["password"])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $hashed_pw = md5($password);
  $str = "SELECT * FROM users WHERE username = '".$username."' AND password = '".$hashed_pw."'";
  $result = mysqli_query($con, $str);
  $row = mysqli_fetch_array($result);
  if (mysqli_num_rows($result) == 1) {
      $_SESSION['nama_user'] = $username;
      header("location: success.php");
  } else {
      echo "Wrong Username or Password!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Halaman Login</title>
  </head>
  <body>
    <header>
        <div class="header" id="header">
            <div id="header_caption">
                <h1>SIMPLE LOGIN PAGE</h1>
            </div>
        </div>
    </header>
    <div id="form">
        <form action="#" method="POST">
          <div class="form-control">
            <input
                type="text"
                name="username"
                autocomplete="off"
                placeholder="&#xf007; USERNAME"
                style="font-family: Arial"
                maxlength="15"
                required
            />
            <input
                type="password"
                name="password"
                autocomplete="off"
                placeholder="&#xf084; PASSWORD"
                style="font-family: Arial"
                maxlength="10"
                required
            />
            <input type="submit" value="SIGN IN" />
          </div>
        </form>
    </div>
  </body>
</html>