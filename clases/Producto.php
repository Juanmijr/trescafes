<?php

require_once 'Conexion.php';

class Producto {
    private $idProducto;
    private $tipo;
    private $nombreProducto;
    private $descripcion;
    private $imagenProducto;
    private $proteinas;
    private $carbohidratos;
    private $grasas;
    
    public function __construct($idProducto, $tipo, $nombreProducto, $descripcion, $imagenProducto, $proteinas, $carbohidratos, $grasas) {
        $this->idProducto = $idProducto;
        $this->tipo = $tipo;
        $this->nombreProducto = $nombreProducto;
        $this->descripcion = $descripcion;
        $this->imagenProducto = $imagenProducto;
        $this->proteinas = $proteinas;
        $this->carbohidratos = $carbohidratos;
        $this->grasas = $grasas;
    }
    
        public static function buscarPorNombre($nombre) {
        $conex = new Conexion();
        if ($conex->connect_errno != 0) {
            echo $conex->connect_error;
        } else {
            $consulta1 = $conex->query("SELECT * from producto WHERE nombreProducto = '$nombre'");
            if ($conex->errno != 0) {
                return $conex->error;
            } else {
                if ($conex->affected_rows > 0) {
                    $object = $consulta1->fetch_object();
                    return new self($object->idProducto, $object->tipo, $object->nombreProducto, $object->descripcion, $object->imagenProducto, $object->proteinas, $object->carbohidratos, $object->grasas);
                } else {
                    return false;
                }
            }
        }
    }
    
    public function __get($name) {
        return $this->$name;
    }
}
