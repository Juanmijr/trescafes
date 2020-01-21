<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexion
 *
 * @author DWES
 */
class Conexion {

    private $host = "localhost";
    private $usu = "dwes";
    private $pass = "abc123.";
    private $bd = "productos";

    public function __construct() {
        parent::__construct($this->host, $this->usu, $this->pass, $this->bd);
    }

}
