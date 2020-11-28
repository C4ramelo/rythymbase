<?php

//models/Canciones.php


class Canciones extends Model {  //realiza la conexión a la base de datos mediante models.php

    public function getCanciones(){

        $this->db->query("SELECT * FROM canciones");
        return $this->db->fetchAll();

        
    }


    public function BuscarCancion($nombrecancion){

        $this->db->query("SELECT * FROM canciones
                        WHERE nombre = '$nombrecancion'");
        return $this->db->fetchAll();
    }

}