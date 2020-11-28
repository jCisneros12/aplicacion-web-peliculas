<?php

/* obtenemos los filtros si se esque se enviaron */
$listaPeliculas = new PeliculaController();
if (($_POST)) {
    $filtro = [
        "tituloPelicula" => $_POST["tituloPelicula"],
        "anioPelicula" => $_POST["anioPelicula"],
        "nombreGenero" => $_POST["nombreGenero"]
    ];
    //print_r($filtros);
    $listaPeliculas = $listaPeliculas->getMoviesByFilter($filtro);
} else {
    $listaPeliculas = $listaPeliculas->getAllMovies();

    require_once 'helpers/paginacion.php';

    $listaPeliculas = $paginacion["listaPeliculas"];
    $cantidadPaginas = $paginacion["cantidadPaginas"];
}
