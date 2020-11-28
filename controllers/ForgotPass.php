<?php
require '../fw/fw.php';
require '../models/Usuarios.php';
require '../models/Canciones.php';
require '../views/ListaUsuarios.php';
require '../views/ListaCanciones.php';
require '../views/ForgotPass.php';
require '../views/NoRegistrado.php';


$fp = new Usuarios;
$v = new NoRegistrado;

if (count($_POST) > 0) {
    // -- V A L I D A C I Ó N   E M A I L
    if (!isset($_POST['email'])) die("error validacion Forgot Pass 1");
    if (!isset($_POST['passwd'])) die("error validacion Forgot Pass 2");

    $fp->ForgotPass($_POST['email'], $_POST['passwd']); //valida lo ingresado  en el modelo, luego vuelve a este controlador

    if($fp =! 1) {
    $c = new Canciones; //lo dejé para verificar un login satisfactorio, me falta una variable de sesión para que un ufpario que no se logueo
    $canciones = $c->getCanciones();

    $c = new ListaCanciones();
    $c->canciones = $canciones; //canciones va para el programa de views, son los datos que hay que mostrar
    $c->render();
    } else {
    
        $v->render();
    }


} else {

    $l = new ForgotPass(); //paso numero 1, muestra la vista de ForgotPass
    $l->render();


}