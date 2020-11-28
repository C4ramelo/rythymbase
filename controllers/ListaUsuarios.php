<?php
//controllers/Login.php

require '../fw/fw.php';
require '../models/Usuarios.php';
require '../models/Canciones.php';
require '../views/ListaUsuarios.php';
require '../views/ListaCanciones.php';
require '../views/NoRegistrado.php';


$l = new Usuarios; //paso numero 2
$v = new NoRegistrado;
if (count($_POST) > 0) {
    // -- V A L I D A C I Ó N   E M A I L
    if (!isset($_POST['email'])) die("error validacion 1???");
    if (!isset($_POST['passwd'])) die("error validacion 2");

    $login = $l->Validar($_POST['email'], $_POST['passwd']); //valida lo ingresado  en el modelo, luego vuelve a este controlador

    if($login) {
        header("Location: home");
        $c = new Canciones; //lo dejé para verificar un login satisfactorio
        $canciones = $c->getCanciones();
    
        $c = new ListaCanciones();
        $c->canciones = $canciones; //canciones va para el programa de views, son los datos que hay que mostrar
        $c->render();
    } else {
        $v->render();
    }
}    else {

    $l = new ListaUsuarios(); //paso numero 1
    #$l->login =$login; //login va para el programa de views, son los datos que hay que mostrar
    $l->render();


}
