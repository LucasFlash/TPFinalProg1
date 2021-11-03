<?php
require_once '.env.php';
require_once 'Usuario.php';
require_once 'Hamster.php';

class RepositorioHamster

{
    private static $conexion = null;

    public function __construct()
    {
        if (is_null(self::$conexion)) {
            $credenciales = credenciales();
            self::$conexion = new mysqli(   $credenciales['servidor'],
                                            $credenciales['usuario'],
                                            $credenciales['clave'],
                                            $credenciales['base_de_datos']);
            if(self::$conexion->connect_error) {
                $error = 'Error de conexión: '.self::$conexion->connect_error;
                self::$conexion = null;
                die($error);
            }
            self::$conexion->set_charset('utf8'); 
        }
    }

    public function saveHamster(Hamster $u)
    {

            

        $q = "INSERT INTO hamster (id_usuario, nombre_hamster, sexo_hamster, fechaNac_hamster) ";
        $q.= "VALUES (?, ?, ?, ?)";
        $query = self::$conexion->prepare($q);
        
        
        $query->bind_param("ssss", $u->getID_usuario(), $u->getNombre_hamster(),
        $u->getSexo_hamster(), $u->getFechaNac_hamster());


        if ( $query->execute() ) {
            // Retornamos el id del usuario recién insertado.
            return self::$conexion->insert_id;
        }
        else {
            return false;
        }


    }

	
        public function get_all(Usuario $usuario)
    {
        $id_usuario = $usuario->getId();
        $q = "SELECT id_hamster, nombre_hamster, sexo_hamster, fechaNac_hamster 
              FROM hamster WHERE id_usuario = ? ";
        try {
            $query = self::$conexion->prepare($q);
            $query->bind_param("i", $id_usuario);
            $query->bind_result($id_hamster, $nombre_hamster, $sexo_hamster, $fechaNac_hamster);

            if ($query->execute()) {
                $lista1Hamsters = array();
                while ($query->fetch()) {
                    $lista1Hamsters[] = new Hamster($id_usuario, $nombre_hamster, $sexo_hamster, $fechaNac_hamster, $id_hamster);
                }
        

                return $lista1Hamsters;
            }
            return false;
        } catch(Exception $e) {
            return false;
        }
    
}

	    

    public function get_one($id_hamster)
    {
        $q = "SELECT id_hamster, nombre_hamster, sexo_hamster, fechaNac_hamster, id_usuario
              FROM hamster WHERE id_hamster= ?";
        try {
            $query = self::$conexion->prepare($q);
            $query->bind_param("i", $id_hamster);
            $query->bind_result($id_hamster, $nombre_hamster, $sexo_hamster, $fechaNac_hamster, $idUsuario);

            if ($query->execute()) {
                if ($query->fetch()) {                    
                    return new Hamster($idUsuario, $nombre_hamster, $sexo_hamster, $fechaNac_hamster, $id_hamster);
                
                }
            }
            return false;
        } catch(Exception $e) {
            return false;
        }
    }


    public function delete(Hamster $hamster)
    {
        $n = $hamster->getId_hamster();
        $q = "DELETE FROM hamster WHERE id_hamster = ?";
        $query = self::$conexion->prepare($q);
        $query->bind_param("i", $n);
        return ($query->execute());
    }



        public function actualizarHamster($nombre_hamster, $id_hamster)
    {
        
       
           $n = $id_hamster;
        $q = "UPDATE hamster SET nombre_hamster = ? WHERE id_hamster = ?";

        $query = self::$conexion->prepare($q);
        $query->bind_param("si", $nombre_hamster, $n);

        return $query->execute();
    }



   }


