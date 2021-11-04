
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
        <title>Registro Online de Hamsters</title>
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
         <div class="col-md-4">
         <table class="table table-striped">
         
            <tr>
                <th>Nombre</th><th>Sexo</th>
            </tr>
        <?php
   
        if (count($hamster) == 0) {
            echo "<tr><td colspan='3'>No tiene cuentas creadas</td></tr>";
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
                echo '</tr>';
                }
                 }
                ?>
                </table>
            </div>
              <div class="col-md-2">
                 <div> 
             <table class="table table-striped">
            <tr>
                <th>Edad en Meses</th>
            </tr>
              <?php
               foreach ($edadFinal as $eFinal) {
                $e = $eFinal ;
                 echo '<tr>';
                echo "<td class='td1'>" . $e . "</td>" ;
                echo '</tr>';

                }
                ?>
            </table>
        </div></div>
     <div class="col-md-6">
             <table class="table table-striped">
            <tr>
                <th colspan="2"><div class="text-center">Modificaciones</div></th>
            </tr>
              <?php
                 foreach ($hamster as $unHamster) {
                 $n = $unHamster->getId_hamster();
                 echo '<tr>';
                 echo "<td class='td1'><button class='btn btn-light' type='button'><a href='actualizar.php?n=$n'>Cambiar Nombre</button></td>";
                 echo "<td class='td1'><button class='btn btn-danger' type='button'><a href='eliminar.php?n=$n'>Eliminar</button></a></td>";
                 echo '</tr>';
                
               }
               ?>
           
             </table>
               </div>
             </div>
            </div>
        <div class="row">
         <div class="col-md-4">
                <button type="button" id="btn-informeG">Informe General de Hamsters</button>
                         <span align="center">
                        <p id="informeG"></p>
        </span>
        <script>
      document.querySelector('#btn-informeG').addEventListener('click',informeG);
function informeG()
{

       var solicitud = new XMLHttpRequest();
        //Definimos qué habrá que hacer cuando cambie la propiedad onreadystate:
        solicitud.onreadystatechange = function() {

          //Si salió todo bien...
          if(this.readyState == 4 && this.status == 200) {

              var promedio = (this.responseText);
             document.querySelector('#informeG').innerHTML = promedio;
        }

        };
         solicitud.open("GET", "PromedioG.php", true);
            solicitud.send();
}

</script></div>
 
         <div class="col-md-4">
         <div align="center">
                <button type="button" id="btn-informeM">Informe de Hamster Macho</button>         
            <p id="informeM"></p>
        </div>
        <script>
      document.querySelector('#btn-informeM').addEventListener('click',informeM);
function informeM()
{

       var solicitud = new XMLHttpRequest();
        //Definimos qué habrá que hacer cuando cambie la propiedad onreadystate:
        solicitud.onreadystatechange = function() {

          //Si salió todo bien...
          if(this.readyState == 4 && this.status == 200) {

              var promedio = (this.responseText);
             document.querySelector('#informeG').innerHTML = promedio;
        }

        };
         solicitud.open("GET", "PromedioM.php", true);
            solicitud.send();
}

</script>
</div>

         <div class="col-md-4">
            <div class="text-center">
                <button type="button" id="btn-informeH">Informe de Hamster Hembra</button>
            <p id="informeH"></p>
         </div>
        <script>
      document.querySelector('#btn-informeH').addEventListener('click',informeH);
function informeH()
{

       var solicitud = new XMLHttpRequest();
        //Definimos qué habrá que hacer cuando cambie la propiedad onreadystate:
        solicitud.onreadystatechange = function() {

          //Si salió todo bien...
          if(this.readyState == 4 && this.status == 200) {

              var promedio = (this.responseText);
             document.querySelector('#informeG').innerHTML = promedio;
        }

        };
         solicitud.open("GET", "PromedioH.php", true);
            solicitud.send();
}

</script>
</div></div>