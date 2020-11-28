<?php
//controllers/CancionesController.php

require '../fw/fw.php';
require '../models/Canciones.php';
require '../views/ListaCanciones.php';
require '../views/ResultBuscarCancion.php';

$c = new Canciones; //paso numero 2

if (count($_POST) > 0) {

    if (!isset($_POST['song'])) die("error validacion buscar cancion");
    $c = new Canciones;
    $cancionespecifica = $c->BuscarCancion($_POST['song']);

    if ($cancionesespecifica) {
        $c = new ResultBuscarCancion();
        $c->cancionespecifica = $cancionespecifica;
        $c->render();
    } else {
        echo 'paso por aca';
    }
} else {
    $canciones = $c->getCanciones(); //muestra listado de canciones, paso numero 1
    $c = new ListaCanciones();
    $c->canciones = $canciones; //canciones va para el programa de views, son los datos que hay que mostrar
    $c->render();
}
