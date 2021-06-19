<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Formulario Logueo</title>
</head>

<body>
<p>Logueate</p>

<?php
if (isset($_REQUEST['login'])) {
  session_start();
  $email = $_REQUEST['email'] ?? '';
  $pasword = $_REQUEST['pass'] ?? '';
  $pasword = md5($pasword);
  include_once "db.php";
  $con = mysqli_connect($host, $user, $pass, $db);
  $query = "SELECT id,email,nombre from usuarios where email='" . $email . "' and pass='" . $pasword . "';  ";
  $res = mysqli_query($con, $query);
  $row = mysqli_fetch_assoc($res);
  if ($row) {
    $_SESSION['id'] = $row['id'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['nombre'] = $row['nombre'];
    header("location: panel.php");
  } else {
  echo("Error de login");
  }
}
?>

<form method="post">
  <input type="email" class="form-control" placeholder="Email" name="email">
  <input type="password" class="form-control" placeholder="Password" name="pass">
  <button type="submit" class="btn btn-primary btn-block" name="login">Sign In</button>
</form>

</body>

</html>