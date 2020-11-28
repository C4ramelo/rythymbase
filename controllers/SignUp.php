<?php
require '../fw/fw.php';
require '../models/Usuarios.php';
require '../models/Canciones.php';
require '../views/ListaUsuarios.php';
require '../views/ListaCanciones.php';
require '../views/SignUp.php';
require '../views/UserExists.php';

$su = new Usuarios;
$v = new UserExists;

if (count($_POST) > 0) {
    // -- V A L I D A C I Ó N   E M A I L
    if (!isset($_POST['email'])) die("error validacion sign up 1");
    if (!isset($_POST['passwd'])) die("error validacion sign up 2");

    $su->SignUp($_POST['email'], $_POST['passwd']); //valida lo ingresado  en el modelo, luego vuelve a este controlador

    if($su =! 1) {
    $c = new Canciones; 
    $canciones = $c->getCanciones();

    $c = new ListaCanciones();
    $c->canciones = $canciones; //canciones va para el programa de views, son los datos que hay que mostrar
    $c->render();
    } else {
    
        $v->render();
    }

} else {

    $l = new SignUp(); //paso numero 1
    #$l->login =$login; //login va para el programa de views, son los datos que hay que mostrar
    $l->render();


}