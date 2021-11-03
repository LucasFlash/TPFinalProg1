<?php
require_once 'Usuario.php';
require_once 'RepositorioUsuario.php';
require_once 'Hamster.php';
require_once 'RepositorioHamster.php';

class ControladorSesion
{
    protected $usuario = null;
    protected $hamster = null;

    public function login($nombre_usuario, $clave)
    {
        $repo = new RepositorioUsuario();
        $usuario = $repo->login($nombre_usuario, $clave);
        //Si falló el login:
        if ($usuario === false) {
            return [false, "Error de credenciales"];
        } else {
            session_start();
            $_SESSION['usuario'] = serialize($usuario);
            return [true, "Usuario autenticado correctamente"];
        }
    }

    public function create($nombre_usuario, $nombre, $apellido, $clave)
    {
        $repo = new RepositorioUsuario();
        $usuario = new Usuario($nombre_usuario, $nombre, $apellido);
        $id = $repo->save($usuario, $clave);
        if ($id === false) {
            return [ false, "Error al crear el usuario"];
        }
        else {
            $usuario->setId($id);
            session_start();
            $_SESSION['usuario'] = serialize($usuario);
            return [ true, "Usuario creado correctamente" ];
        }
    }





        public function createHamster($id_usuario, $nombre_hamster, $sexo_hamster, $fechaNac_hamster)
    {
          
        $repo = new RepositorioHamster();
        $Hamster = new Hamster($id_usuario, $nombre_hamster, $sexo_hamster, $fechaNac_hamster);
        $id_hamster = $repo->saveHamster($Hamster);


        if ($id_hamster === false) {
            return [ false, "Error al añadir el Hamster"];
        }
        else {

            $Hamster->setId_hamster($id_hamster);
            session_start();
            $_SESSION['Hamster'] = serialize($Hamster);
            return [ true, "Hamster añadido correctamente" ];
        }
    }




    }




