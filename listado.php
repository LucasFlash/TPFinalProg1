
<?php
require_once 'clases/Usuario.php';
require_once 'clases/Hamster.php';
require_once 'clases/RepositorioHamster.php';
require_once "edad0.php";



?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Sistema bancario</title>
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
        <h3><?php echo $nomApe;?></h3>
        <h3>Listado de Hamsters</h3>

         <div class="row">
         <div class="col-md-6">
            <div class="estilo1"> 
         <table class="table table-striped">
         
            <tr>
                <th>Nombre</th><th>Sexo</th>
            </tr>
        <?php
   
        if (count($hamster) == 0) {
            echo "<tr><td colspan='5'>No tiene cuentas creadas</td></tr>";
        }
         else {
            
         foreach ($hamster as $unHamster) {
                $n = $unHamster->getId_hamster();
                $sex = $unHamster->getSexo_hamster();
                
                if ( $sex == "0") 
                    { $sex = "Hembra"; } 
                else { $sex = "Macho"; }
                      
                echo '<tr>'; 
                echo "<td class='td1' id='Nombre-$n'>".$unHamster->getNombre_hamster()."</td>";
                echo "<td class='td1' id='Sexo-$n'>".$sex."</td>";
               }
               }
               ?>
           
             </table>
               </div>
             </div>
            
               
             <div class="col-md-6">
                 <div class="estilo2"> 
             <table class="table table-striped">
            <tr>
                <th>Edad en Meses</th><th colspan="2">Modificaciones</th>
            </tr>
              <?php
               foreach ($edadFinal as $eFinal) {
                $e = $eFinal ;
                 echo '<tr>';
                echo "<td class='td1'>" . $e . "</td>" ;
                echo "<td class='td1'><button class='btn btn-light' type='button'><a href='actualizar.php?n=$n'>Cambiar Nombre</button></td>";
                echo "<td class='td1'><button class='btn btn-danger' type='button'><a href='eliminar.php?n=$n'>Eliminar</button></a></td></div>";
                echo '</tr>';
                }
                ?>
            </table>
        </div>
            </div>


  