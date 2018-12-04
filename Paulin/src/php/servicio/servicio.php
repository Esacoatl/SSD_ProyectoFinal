<?php
  error_reporting(E_ALL & ~E_NOTICE);
  require("../conexion.php");

function logIn($valor) {

  $conexion = conectar();

  $sql = "SELECT * FROM usuarios WHERE correo LIKE '".$valor."';";

  $result = mysqli_query($conexion, $sql);
  

  if(!$result = mysqli_query($conexion, $sql)) die();

  $usuarios = array();

  while($row = mysqli_fetch_array($result))  {

    $password = $row['password'];
    $correo = $row['correo'];

    $usuarios[] = array('password' => $password,
                        'correo' => $correo);
  }

  $close = mysqli_close($conexion) or die("Ha sucedido un error inexperado en la desconexion de la base de datos");

  $json_usuarios = json_encode($usuarios);
  return $json_usuarios;

}

?>
