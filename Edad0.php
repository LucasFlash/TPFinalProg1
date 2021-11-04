<?php
require_once 'clases/Usuario.php';
require_once 'clases/Hamster.php';
require_once 'clases/RepositorioHamster.php';


session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
    $nomApe = $usuario -> getNombreApellido();
    $rc = new RepositorioHamster();
    $hamster = $rc->get_all($usuario);
    
     }




               $sum = 0;
               $sumMacho = 0;
                $ResultTotal = 0;
               $ResultMacho = 0;
                $menores = 0;
                $mayores = 0;
                $adultos = 0;
               
               $edadFinal = array();
               




            foreach ($hamster as $unHamster) {

                $n = $unHamster->getId_hamster();
                $sex = $unHamster->getSexo_hamster();
                $sum = $sum + 1;
      
               
                $edad = $unHamster->getFechaNac_hamster();
                $yearh = date('Y', strtotime($edad));
                $monthh = date('m', strtotime($edad));
                $ayear = date('Y');
                $amonth = date('m');
                $Result = ( ( $ayear - $yearh - 1 ) * 12 ) + ( 12 - $monthh ) + ( $amonth );
                    if ( $Result < 5) 
                    { $menores = $menores + 1; }
                    else  { if ( $Result > 24) 
                    { $mayores = $mayores + 1; } 
                     else {$adultos = $adultos + 1;}
                     }

                $edadFinal[] = $Result;
              
                

                $ResultTotal = $ResultTotal + $Result;

               

                if ( $sex == "0") 
                    { $sex = "Hembra"; } 
                else { $sex = "Macho";
                       $sumMacho = $sumMacho + 1; 
                       $ResultMacho = $ResultMacho + $Result; }

                       }
                  if ( $sum > 0){
                $Promedio = $ResultTotal / $sum;} else {
                $Promedio = 0;} 
                  if ( $sumMacho > 0){
                $PromedioMacho = $ResultMacho / $sumMacho;} else {
                $PromedioMacho = 0;}
                  if ( ($sum - $sumMacho) > 0){
                $PromedioHembra = ($ResultTotal - $ResultMacho) / ($sum - $sumMacho);} else {
                $PromedioHembra = 0;}

?>


