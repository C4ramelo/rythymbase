<?php

//models/Canciones.php


class Canciones extends Model
{  //realiza la conexión a la base de datos mediante models.php

    public function getCanciones()
    {

        $this->db->query("SELECT * FROM canciones");
        return $this->db->fetchAll();
    }


    public function BuscarCancion($nombrecancion)
    {


        if (strlen($nombrecancion) < 1) throw new ValidacionException('error1 Busqueda Cancion');//die("Error 1 Busqueda Cancion"); #si las validaciones desde js están hechas, representa un problema de seguridad. Analizo el dato
        if (strlen($nombrecancion) > 50) throw new ValidacionException('error2 Busqueda Cancion');//die("Error 2 Busqueda Cancion");
        $nombrecancion = substr($nombrecancion, 0, 50);

        $nombrecancion = $this->db->escapeWildcards($nombrecancion);
        $nombrecancion = str_replace(' ', '', $nombrecancion);

        $this->db->query("SELECT c.nombre AS cancion, a.nombre AS artista, c.ubicacion AS ubicacion
                FROM canciones c LEFT OUTER JOIN artistas a ON c.artista_id = a.artista_id 
        WHERE UPPER(c.nombre) LIKE UPPER('%$nombrecancion%') OR UPPER(a.nombre) LIKE UPPER('%$nombrecancion%')");

        return $this->db->fetchAll();
    }


    public function SubirTablatura($nombrecancion, $nombreartista)
    {
        if (strlen($nombrecancion) < 1) throw new ValidacionException('error1 Subir Tablatura');//die("Error 1 Subir Tablatura"); #si las validaciones desde js están hechas, representa un problema de seguridad. Analizo el dato
        if (strlen($nombrecancion) > 50) throw new ValidacionException('error2 Subir Tablatura');//die("Error 2 Subir Tablatura");
        $nombrecancion = substr($nombrecancion, 0, 50);


        $nombrecancion = $this->db->escapeWildcards($nombrecancion);
        //$nombrecancion = str_replace(' ', '', $nombrecancion);
        //$this->db->escape($nombrecancion); no sirve

        if (strlen($nombreartista) < 1) throw new ValidacionException('error2 Strlen Subir Tablatura');//die("Error 2 strlen Subir Tablatura"); #si las validaciones desde js están hechas, representa un problema de seguridad. Analizo el dato
        if (strlen($nombreartista) > 50) throw new ValidacionException('error 3 Subir Tablatura');//die("error3");
        $nombreartista = substr($nombreartista, 0, 50);
        

        $nombreartista = $this->db->escapeWildcards($nombreartista);
        //$nombreartista = str_replace(' ', '', $nombreartista);
        //$this->db->escape($nombreartista); no sirve

        $tmpFile = $_FILES["file"]["tmp_name"];
        move_uploaded_file($tmpFile, '../files/' . $nombrecancion . $nombreartista . '.pdf');

        $pathfile = ($nombrecancion . $nombreartista . '.pdf');

        $artistaaux = new Artistas;

        if (!$artistaaux->ExisteArtista($nombreartista)) {
            //insertar en la tabla artistas el nuevo artista
            $this->db->query("INSERT INTO artistas
                        (nombre) VALUES ('$nombreartista') ");

            $this->db->query("INSERT INTO canciones (nombre, artista_id, ubicacion) 
             VALUES (('$nombrecancion'),(SELECT artista_id FROM artistas WHERE nombre LIKE ('$nombreartista')), ('$pathfile'))");
        } else {
            $this->db->query("INSERT INTO canciones (nombre, artista_id, ubicacion)
            VALUES (('$nombrecancion'),(SELECT artista_id FROM artistas WHERE nombre LIKE ('$nombreartista')), ('$pathfile'))");

        }



        // despues de verificar si el artista existe o no, paso a insertar la cancion con su nombre respectivo y su id de artista correspondiente

        /* $this->db->query("INSERT INTO canciones /*verificar que funcione 
                        (ubicacion)  VALUES ('../files/$nombrecancion.$nombreartista') "); * probar esta query para insertarla */
    }
}
class ValidacionException extends Exception{

}