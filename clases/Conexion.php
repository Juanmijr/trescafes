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
class Conexion extends mysqli {

    private $host = "localhost";
    private $usu = "daw";
    private $pass = "Cfgsdaw1.";
    private $bd = "trescafes";

    public function __construct() {
        parent::__construct($this->host, $this->usu, $this->pass, $this->bd);
        parent::set_charset("utf8");
    }

}
