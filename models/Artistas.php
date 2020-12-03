<?php

//models/Artistas.php


class Artistas extends Model
{

    public function ExisteArtista($nombreartista)
    {

        if (strlen($nombreartista) < 1) throw new ValidacionException('error artista1');//die("error artista1"); #si las validaciones desde js están hechas, representa un problema de seguridad. Analizo el dato
        if (strlen($nombreartista) > 50) throw new ValidacionException('error artista2');//die("error artista2");


        $nombreartista = substr($nombreartista, 0, 50);
        $nombreartista = $this->db->escapeWildcards($nombreartista);

        $respuesta = $this->db->query("SELECT a.nombre FROM artistas a WHERE UPPER(a.nombre) = UPPER('$nombreartista')
                                    LIMIT 1");

        if ($this->db->numRows($respuesta) == 1) {
            return $this->db->fetchAll();
        } else {
            return false;
        }
    }
}

class ValidacionException extends Exception{

}
