<?php     
  
  include_once('conexion.php');

  $sql = "SELECT * FROM datos_usuarios";
  $resultado = $base->prepare($sql);
  $resultado->execute();
  $send = $resultado->fetchAll();


  if(isset($_GET)){
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM datos_usuarios WHERE id= ?";
    $resultado = $base->prepare($sql);
    $resultado->execute([$id]);
    $row = $resultado->fetch();
  
    

  }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hello, world!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
  </head>
  <body>
   
     <div class="container mt-7">
     <h5 class="text-center">Crud PHP</h5>
        <div class="row">
          
           <div class="col-md-7">
               
            <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Direccion</th>
                <th scope="col">FOTOS</th>
                </tr>
            </thead>
            <tbody>
             <?php  foreach($send as $registro):   ?>
                <tr>
               
                <td><?= $registro['id'] ?></td>
                <td><?= $registro['nombre'] ?></td>
                <td><?= $registro['apellido'] ?></td>
                <td><?= $registro['direccion'] ?></td>
                <td> <a href="/CRUD-PHP/uploads/<?= $registro['foto'] ?>" target="_blank"><img src="/CRUD-PHP/uploads/<?= $registro['foto'] ?>" alt="" width="30"></a>  </td>
                <td>
                  <a href="delete.php?id=<?php echo $registro['id']; ?>" > Borrar</a>
                </td>
                <td>
                 <a href="read.php?id=<?php echo $registro['id']; ?>"> editar</a>
                </td>
                </tr>

                <?php  endforeach   ?>  
              </tbody>
            </table>
           </div>

           <div class="col-md-5">
            <?php if(!$_GET): ?> 
               <form action="save.php" method="POST" enctype="multipart/form-data" >
                   <div class="form-group col-md-4">
                      <label for="">Archivo </label>
                      <input  type="file" name="imagen" size="30" class="form-control" >
                </div>

                 <div class="form-group">
                   <input type="text" name="nombre" class="form-control" placeholder="nombre" autfocus>
                 </div>

                 <div class="form-group">
                   <input type="text" name="apellido" class="form-control" placeholder="apellido" autfocus>
                 </div>
                 <div class="form-group">
                   <input type="text" name="direccion" class="form-control" placeholder="descriotion" autfocus>
                 </div>
                   
                   <div class="form-group">
                     <input type="submit" class="btn btn-primary btn-block" value="guardar" name="save">
                   </div>
               </form>

              <?php endif ?>

              <?php if($_GET): ?>

              <form action="update.php" method="GET">
                 <div class="form-group">
                   <input type="text" name="nombre" class="form-control"  value="<?php echo $row['nombre']; ?>" >
                   </div>
                 <div class="form-group">
                   <input type="text" name="apellido" class="form-control"  value="<?php echo $row['apellido']; ?>" >
                 </div>
                 <div class="form-group">
                   <input type="text" name="direccion" class="form-control"  value="<?php echo$row['direccion']; ?>"  >
                 </div>

                   <input type="hidden" name="id" value="<?php echo $row['id']; ?>" >
                   
                   <div class="form-group">
                     <input type="submit" class="btn btn-warning btn-block" value="actualziar">
                   </div>
              </form>
              <?php endif ?>
           </div>


        </div>
     </div>
  </body>
</html>