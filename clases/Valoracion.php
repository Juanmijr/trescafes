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

       
    private $usuario;
    private $producto;
    private $valoracion;
    private $comentario;
    private $fecha;

    public function __construct($usuario, $producto,$valoracion, $comentario, $fecha) {
        $this->usuario = $usuario;
        $this->producto = $producto;
        $this->valoracion = $valoracion;
        $this->comentario = $comentario;
        $this->fecha = $fecha;
    }
        public function __get($name) {
        return $this->$name;
    }

        public function insertarValoracion() {
        $conex = new Conexion();
        if ($conex->connect_errno != 0) {
            echo $conex->connect_error;
        } else {
            $consulta1 = $conex->query("INSERT INTO valoracion VALUES('','$this->usuario','$this->producto', '$this->valoracion', '$this->comentario', '$this->fecha') ");
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

    
}
