<?php

require_once '../clases/Conexion.php';

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
        $conex = new Conexion();
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

    public function __get($name) {
        return $this->$name;
    }

}
