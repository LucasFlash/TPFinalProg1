<?php
require_once 'clases/Usuario.php';
require_once 'clases/RepositorioHamster.php';
require_once 'clases/RepositorioUsuario.php';
require_once 'clases/Hamster.php';



session_start();
if (isset($_SESSION['usuario']) && isset($_GET['n'])) {
    $usuario = unserialize($_SESSION['usuario']);
    $rc = new RepositorioHamster();
    $hamster = $rc->get_one($_GET['n']);


}

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


        
    </head>
    <body class="container">

 




      <div class="jumbotron text-center">
      <h1>Sistema bancario</h1>
      </div>    
      <div class="text-center">
        <?php
        if (isset($_GET['mensaje'])) {
            echo '<p class="alert alert-primary">'.$_GET['mensaje'].'</p>';
        }
        ?>
        
        <h3>Listado de Hamsters</h3>
         <form action="actualizar.php" method="post">
          <input type="hidden" name="num_hamster" value="<?php echo $_GET['n'];?>"> </input><br>  
        <input name="nombre_hamster"></input><br>
        <input type="submit" value="Añadir" class="btn btn-primary">
        </form>  
        <?php echo $_GET['n'];?>
        
