<?php
//controllers/CancionesController.php

require '../fw/fw.php';
require '../models/Canciones.php';
require '../models/Artistas.php';
require '../views/ListaCanciones.php';
require '../views/ResultBuscarCancion.php';
require '../views/UploadSatisfactorio.php';

$c = new Canciones; //paso numero 2

if (count($_POST) > 0) {
    //if (!isset($_POST['busquedamusica'])) die("error validacion buscar cancion"); (original)
    if (isset($_POST['busquedamusica'])) {
        $cancionespecifica = $c->BuscarCancion($_POST['busquedamusica']);

        if ($cancionespecifica) {
            $v = new ResultBuscarCancion();
            $v->cancionespecifica = $cancionespecifica;
            $v->render();
        } else {
            header("Location: home");
        }
    } if (isset($_POST['submit'])) {
        $a = new Artistas;
        $existeartista= $a->ExisteArtista($_POST['nombreartista']);
        //agregar un modelo artistas para verificar con alguna funcion si el artista al que se le esta intentando añadir la cancion, no existe

        $subirtablatura = $c->SubirTablatura($_POST['nombrecancion'], $_POST['nombreartista']);
        /*$tmpFile = $_FILES["file"]["tmp_name"];
        move_uploaded_file($tmpFile, '../files/' . $_POST['nombrecancion'].$_POST['nombreartista'] .'.pdf'); */
        $v = new UploadSatisfactorio();
        $v->render(); 
    
        }


} else {
    $canciones = $c->getCanciones(); //muestra listado de canciones, paso numero 1
    $c = new ListaCanciones();
    $c->canciones = $canciones; //canciones va para el programa de views, son los datos que hay que mostrar
    $c->render();
}
