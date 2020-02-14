<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ValoracionUsuarioProducto
 *
 * @author DWES
 */
require_once 'clases/Conexion.php';
require_once 'clases/Producto.php';
require_once 'clases/Usuario.php';
require_once 'clases/Valoracion.php';

class ValoracionUsuarioProducto {

    public static function nombreUsuarioporIDVALORACION($idValoracion) {
        $conex = new Conexion();
        if ($conex->connect_errno != 0) {
            echo $conex->connect_error;
        } else {

            $consulta1 = $conex->query("SELECT * FROM usuario, valoracion WHERE idValoracion = '$idValoracion' && usuario.idUsuario = valoracion.usuario");
            if ($conex->errno != 0) {
                return $conex->error;
            } else {

                if ($conex->affected_rows > 0) {
                     $object = $consulta1->fetch_object();
                     
                     return new Usuario($object->idUsuario, $object->email, $object->nombreUsuario, $object->contrasenia, $object->nombre, $object->apellido1, $object->apellido2, $object->fechaNacimiento, $object->pais, $object->codigoPostal, $object->telefono, $object->rol, $object->imagenPerfil);

                    
                } else {
                    return false;
                }
            }
        
        }
    }
    
    public static function nombreProductoporIDValoracion ($idValoracion){
           $conex = new Conexion();
        if ($conex->connect_errno != 0) {
            echo $conex->connect_error;
        } else {

            $consulta1 = $conex->query("SELECT producto.nombreProducto FROM usuario, producto, valoracion WHERE idValoracion = '$idValoracion' && valoracion.producto = producto.idProducto && usuario.idUsuario = valoracion.usuario");
            
            if ($conex->errno != 0) {
                return $conex->error;
            } else {

                if ($conex->affected_rows > 0) {
                     $object = $consulta1->fetch_object();
                    
                        return $object->nombreProducto;
                    
                } else {
                    return false;
                }
            }
        
        }
    }

}
