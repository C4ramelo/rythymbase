<?php
//controllers/CancionesController.php

require '../fw/fw.php';
require '../models/Canciones.php';
require '../views/ListaCanciones.php';
require '../views/ResultBuscarCancion.php';

$c = new Canciones; //paso numero 2

if (count($_POST) > 0) {
    if (!isset($_POST['busquedamusica'])) die("error validacion buscar cancion");
    $cancionespecifica = $c->BuscarCancion($_POST['busquedamusica']);

    if ($cancionespecifica) {
        $v = new ResultBuscarCancion();
        $v->cancionespecifica = $cancionespecifica;
        $v->render();
    } else {
        echo 'paso por aca';
    }
} else {
    $canciones = $c->getCanciones(); //muestra listado de canciones, paso numero 1
    $c = new ListaCanciones();
    $c->canciones = $canciones; //canciones va para el programa de views, son los datos que hay que mostrar
    $c->render();
}
