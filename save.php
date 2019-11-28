<?php     
  
  include_once('conexion.php');

 $nombre     =$_POST['nombre'];
 $apellido   =$_POST['apellido'];
 $direccion  =$_POST['direccion'];

 

 $nombre_img =  $_FILES["imagen"]["name"];
 $tipo_imagen   =  $_FILES["imagen"]["type"];
 $tamano_imagen =  $_FILES["imagen"]["size"];


 $directorio = $_SERVER['DOCUMENT_ROOT'].'/CRUD-PHP/uploads/';
 move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nombre_img);

$query = "INSERT INTO datos_usuarios(nombre, apellido, direccion, foto) VALUES(?, ?, ?,?)";
$resultado = $base->prepare($query);
$resultado->execute([$nombre,$apellido, $direccion,$nombre_img]);

    header('location:read.php')
?>