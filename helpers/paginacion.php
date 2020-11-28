<?php
require_once 'controllers/PeliculaController.php';
/* codigo para paginacion */
//obtenemos el numero de pagina
$pagina = (isset($_GET["pagina"]) ? (int)$_GET["pagina"] : 1);
//cantidad de peliculas a mostrar por pagina
$postPorPagina=10;
//calculamos el inicio de post para cada pagina
$inicio = ($pagina > 1) ? ($pagina * $postPorPagina - $postPorPagina) : 0;

/* pasamos los parametros de paginacion al controlador */
$peliculaController = new PeliculaController();
$paginacion = $peliculaController->getMoviesByPageNumber($inicio, $postPorPagina);



