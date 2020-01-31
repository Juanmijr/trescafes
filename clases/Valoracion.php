<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Valoraciones
 *
 * @author DWES
 */
class Valoracion {

   private $idValoracion;   
    private $usuario;
    private $producto;
    private $valoracion;
    private $comentario;
    private $fecha;

    public function __construct( $idValoracion, $usuario, $producto,$valoracion, $comentario, $fecha) {
        $this->idValoracion = $idValoracion;
        $this->usuario = $usuario;
        $this->producto = $producto;
        $this->valoracion = $valoracion;
        $this->comentario = $comentario;
        $this->fecha = $fecha;
    }
        public function __get($name) {
        return $this->$name;
    }

        public static function insertarValoracion($usuario, $producto, $valoracion, $comentario) {
        $conex = new Conexion();
        if ($conex->connect_errno != 0) {
            echo $conex->connect_error;
        } else {
            $fecha = date("Y-m-d",time());
            $consulta1 = $conex->query("INSERT INTO valoracion  VALUES('','$usuario','$producto', '$valoracion', '$comentario','$fecha')");
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
    
    public static function buscarValoracionesporID ($idProducto){
          $conex = new Conexion();
        if ($conex->connect_errno != 0) {
            echo $conex->connect_error;
        } else {
            $consulta1 = $conex->query("SELECT * from valoracion WHERE producto = '$idProducto'");
            if ($conex->errno != 0) {
                return $conex->error;
            } else {
                if ($conex->affected_rows > 0) {
                      $valoraciones  = array();
                  while( $object = $consulta1->fetch_object()){
                   $valoraciones[] = (new self($object->idValoracion, $object->usuario, $object->producto, $object->valoracion, $object->comentario, $object->fecha));
                  }
                  
                  } else {
                    return false;
                }
               
            }
             return $valoraciones;
        }
    }
     public static function EliminarProducto($idValoracion) {
        $conex = new Conexion();
        if ($conex->connect_errno != 0) {
            echo $conex->connect_error;
        } else {
            $consulta1 = $conex->query("DELETE FROM valoracion WHERE idValoracion = '$idValoracion' ");
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
        public static function buscarValoracionesporIDUsuario ($idUsuario){
          $conex = new Conexion();
        if ($conex->connect_errno != 0) {
            echo $conex->connect_error;
        } else {
            $consulta1 = $conex->query("SELECT * from valoracion WHERE usuario = '$idUsuario'");
            if ($conex->errno != 0) {
                return $conex->error;
            } else {
                if ($conex->affected_rows > 0) {
                      $valoraciones  = array();
                  while( $object = $consulta1->fetch_object()){
                   $valoraciones[] = (new self($object->idValoracion, $object->usuario, $object->producto, $object->valoracion, $object->comentario, $object->fecha));
                  }
                  
                  } else {
                    return false;
                }
               
            }
             return $valoraciones;
        }
    }
    public function __toString() {
        return "Usuario -> ". $this->usuario ;
    }
}

