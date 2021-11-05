<?php
require_once 'clases/Usuario.php';
require_once 'clases/RepositorioHamster.php';
require_once 'clases/RepositorioUsuario.php';
require_once 'clases/Hamster.php';




if (isset($_POST['nombre_hamster'])) { 
    $rc = new RepositorioHamster();
    $result = $rc->actualizarHamster($_POST['nombre_hamster'], $_POST['num_hamster']);
    if( $result === true ) {
        $redirigir = 'listado.php?mensaje=Correcto';
    }
    else {
        $redirigir = 'actualizar.php?n='.$_POST['num_hamster'].'mensaje=Error';
    }
    header('Location: ' . $redirigir);
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Actualizar Nombre de un Hamster</title>
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="estilos.css">


        
    </head>
    <body class="container">

      <div class="jumbotron text-center">
      <h1>Criadero de Hamsters</h1>
      </div>    
      <div class="text-center">
        <?php
        if (isset($_GET['mensaje'])) {
            echo '<p class="alert alert-primary">'.$_GET['mensaje'].'</p>';
        }
        ?>
        
        <h3 class="h31">Ingrese el Nuevo Nombre del Hamster</h3>
         <form action="actualizar.php" method="post">
          <input type="hidden" name="num_hamster" value="<?php echo $_GET['n'];?>"> </input><br>  
        <input name="nombre_hamster"></input><br><br>
        <input type="submit" value="Añadir" class="btn btn-primary">
        </form>  
        
        
