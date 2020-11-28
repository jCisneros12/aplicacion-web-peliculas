<?php
require_once 'helpers/sessionmain.php';


require_once "config/configControllers.php";

/* BaseLayout::headHtml();
BaseLayout::renderHead(); */
/**************** CONTROLADOR FRONTAL *********************/

// Definimos un ontrolador por defecto
$controller = DEFAULT_CONTROLLER;

// Tomamos el controlador requerido por el usuario
// en caso de no especificarse seleccionamos el controlador por defecto.
if (!empty($_GET['controller'])) {
    $controller = $_GET['controller'];
}

// Definimos una acción por defecto
$action = DEFAULT_ACTION;

// Tomamos la accion requerida por el usuario
// en caso de no especificarse seleccionamos la acción por defecto.
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// Ya tenemos el controlador y la accion
// Formamos el nombre del fichero que contiene nuestro controlador
$fullController = CONTROLLERS_DIR . $controller . "Controller.php"; //controllers/HomeController.php

$controller = $controller . "Controller"; //HomeController

// Si la variable ($controller) es un fichero lo requerimos
if (is_file($fullController)) {
    require_once($fullController);
    $printController = new $controller(); //new HomeController()
} else {
    die("<main><h1>Controlador no localizado - 404 Not Found</h1></main>");
}

// Si la variable $action es una función la ejecutamos o detenemos el script
if (method_exists($printController, $action)) {
    $printController->$action();
} else {
    die("<main><h1>Metodo no definido - 404 Not Found</h1></main>");
}


