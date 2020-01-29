<?php

require_once 'Conexion.php';

class Usuario {
    private $idUsuario;
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
    private $rutaImagen;

  

    public function __construct($email, $nombreUsuario, $contrasenia, $nombre, $apellido1, $apellido2, $fechaNacimiento, $pais, $codigoPostal, $telefono, $rol,$rutaImagen) {
        $this->email = $email;
        $this->nombreUsuario = $nombreUsuario;
        $this->contrasenia = $contrasenia;
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->pais = $pais;
        $this->codigoPostal = $codigoPostal;
        $this->telefono = $telefono;
        $this->rol = $rol;
        $this->rutaImagen = $rutaImagen;
    }

    public static function insertarUsuario($email, $nombreUsuario, $contrasenia, $nombre, $apellido1, $apellido2, $fechaNacimiento, $pais, $codigoPostal, $telefono, $rol) {
        $conex = new Conexion();
        if ($conex->connect_errno != 0) {
            echo $conex->connect_error;
        } else {
            $consulta1 = $conex->query("INSERT INTO usuario VALUES('','$email','$nombreUsuario', '$contrasenia', '$nombre', '$apellido1', '$apellido2','$fechaNacimiento','$pais','$codigoPostal','$telefono','$rol',null) ");
            if ($conex->errno != 0) {
                return $conex->error;
            } else {
                if ($consulta1) {
                    return true;
                } else {
                    return $conex->error;
                }
            }
        }
    }

    public static function buscarPorCorreo($email) {
        $conex = new Conexion();
        if ($conex->connect_errno != 0) {
            echo $conex->connect_error;
        } else {
            $consulta1 = $conex->query("SELECT * from usuario WHERE email = '$email'");
            if ($conex->errno != 0) {
                return $conex->error;
            } else {
                if ($conex->affected_rows > 0) {
                    $object = $consulta1->fetch_object();
                    return new self($object->idUsuario, $object->email, $object->nombreUsuario, $object->contrasenia, $object->nombre, $object->apellido1, $object->apellido2, $object->fechaNacimiento, $object->pais, $object->codigoPostal, $object->telefono, $object->rol, $object->rutaImagen);
                } else {
                    return false;
                }
            }
        }
    }
    

    public static function comprobarUsuario($email, $password) {
        $conex = new Conexion();
        if ($conex->connect_errno != 0) {
            echo $conex->connect_error;
        } else {
            $consulta1 = $conex->query("SELECT * from usuario WHERE email = '$email' AND contrasenia = '$password'");
            if ($conex->errno != 0) {
                return $conex->error;
            } else {
                if ($conex->affected_rows < 1) {
                    return FALSE;
                }


                return TRUE;
            }
        }
    }

    public static function recuperarUsuarios() {
        $conex = new Conexion();
        if ($conex->connect_errno) {
            return FALSE;
        } else {
            $result = $conex->query("SELECT * FROM usuario");
            if ($conex->affected_rows != 0) {
                while ($object = $result->fetch_object()) {
                    $p = new self($object->idUsuario, $object->email, $object->nombreUsuario, $object->contrasenia, $object->nombre, $object->apellido1, $object->apellido2, $object->fechaNacimiento, $object->pais, $object->codigoPostal, $object->telefono, $object->rol,$object->rutaImagen);
                    $array[] = $p;
                }
                return $array;
            } else {
                return FALSE;
            }
        }
        $conex->close();
    }

    public static function EliminarUsuario($email) {
        $conex = new Conexion();
        if ($conex->connect_errno != 0) {
            echo $conex->connect_error;
        } else {
            $consulta1 = $conex->query("DELETE FROM usuario WHERE email = '$email' ");
            if ($conex->errno != 0) {
                return $conex->error;
            } else {
                if ($consulta1) {
                    return true;
                } else {
                    return $conex->error;
                }
            }
        }
    }
    
    public static function modificarUsuario($email, $nombreUsuario, $contrasenia, $nombre, $apellido1, $apellido2, $fechaNacimiento, $pais, $codigoPostal, $telefono, $rol) {
        $conex = new Conexion();
        if ($conex->connect_errno != 0) {
            echo $conex->connect_error;
        } else {
            $consulta1 = $conex->query("UPDATE usuario SET nombreUsuario = '$nombreUsuario', contrasenia = '$contrasenia', nombre = '$nombre', apellido1 = '$apellido1', apellido2 = '$apellido2', fechaNacimiento = '$fechaNacimiento', pais = '$pais', codigoPostal = '$codigoPostal', telefono = '$telefono', rol = '$rol' WHERE email = '$email'");
            if ($conex->errno != 0) {
                return $conex->error;
            } else {
                if ($conex->affected_rows < 1) {
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
