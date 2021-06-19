<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Está logueado</title>
</head>
<body>
llegó

<?php 

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if( isset($_REQUEST['sesion']) && $_REQUEST['sesion']=="cerrar" ){
  session_destroy();
  header("location: index.php");
}
if (isset($_SESSION['id']) == false) {
  header("location: index.php");
}else{
	echo($_SESSION['nombre']);
};

?>

<a href="panel.php?sesion=cerrar" title="Cerrar sesion">Logout</a>

</body>
</html>
