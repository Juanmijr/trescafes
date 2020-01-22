<?php

require_once 'Conexion.php';

class Usuario {

    private $email;
    private $nombreUsuario;
    private $contrasenia;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $fechaNacimiento;
    private $pais;
    private $codigoPostal;
    private $telefono;
    private $rol;

    function getUsuarios() {
       
    }

    public function __construct($email, $nombreUsuario, $contrasenia, $nombre, $apellido1, $apellido2, $fechaNacimiento, $pais, $codigoPostal, $telefono, $rol) {
        $this->email = $email;
        $this->nombreUsuario = $nombreUsuario;
        $this->contrasenia = $contrasenia;
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->pais = $pais;
        $this->contrasenia = $contrasenia;
        $this->codigoPostal = $codigoPostal;
        $this->telefono = $telefono;
        $this->rol = $rol;
    }

    public static function buscarPorCorreo ($correo){
         $conex = new Conexion();
          if ($conex->connect_errno != 0) {
            echo $conex->connect_error;
        } else {
             $consulta1= $conex->query("SELECT * from usuario WHERE email = '$correo'");
            if ($conex->errno != 0) {
                return $conex->error;
                
            } else {
               if ($conex->affected_rows < 1){
                   return FALSE;
               }
              
                
                return TRUE;
            }
        }
    }
    public function __get($name) {
        return $this->$name;
    }

}
