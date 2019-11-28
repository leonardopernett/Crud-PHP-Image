<?php     
  
  include_once('conexion.php');

 
  $id = $_GET['id'];
  $nombre = $_GET['nombre'];
  $apellido = $_GET['apellido'];
  $direccion = $_GET['direccion'];

  $query ="UPDATE datos_usuarios SET nombre =?, apellido= ? , direccion=? WHERE id= ? "; 
  $resultado = $base->prepare($query);
  $resultado->execute([$nombre, $apellido,$direccion,$id]);

 header('location:read.php');


 
?>