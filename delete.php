<?php     
  
  include_once('conexion.php');


  if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $query ="DELETE FROM datos_usuarios WHERE id= ?"; 
    $resultado = $base->prepare($query);
    $resultado->execute([$id]);

  }
  header('location:read.php');

?>