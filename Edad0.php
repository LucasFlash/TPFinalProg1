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
               
               $edadFinal = array();
               




            foreach ($hamster as $unHamster) {

                
                $sex = $unHamster->getSexo_hamster();
                $sum = $sum + 1;
      

                $edad = $unHamster->getFechaNac_hamster();
                $yearh = date('Y', strtotime($edad));
                $monthh = date('m', strtotime($edad));
                $ayear = date('Y');
                $amonth = date('m');
                $Result = ( ( $ayear - $yearh - 1 ) * 12 ) + ( 12 - $monthh ) + ( $amonth );
                $edadFinal[] = $Result;
              
                

                $ResultTotal = $ResultTotal + $Result;

               

                if ( $sex == "0") 
                    { $sex = "Hembra"; } 
                else { $sex = "Macho";
                       $sumMacho = $sumMacho + 1; 
                       $ResultMacho = $ResultMacho + $Result; }
                       }
  
        
?>


