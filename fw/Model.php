<?php

// fw/Model.php


abstract class Model { //abstract para que no se pueda instanciar

    protected $db; //visibilidad para acceder desde la subclase

    public function __construct(){
        $this->db = database::getInstance();
    }
}
?>