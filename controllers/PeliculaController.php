<?php

class PeliculaController
{

    /* obtenemos todas las peliculas  */
    public function getAllMovies()
    {
        require_once "database/DatabaseMysql.php";
        require_once "models/PeliculaModel.php";
        $pelicula = new PeliculaModel();
        $listaPeliculas = $pelicula->getPeliculas();
        return $listaPeliculas;
    }

    /* obtenemos un listado limitado de peliculas */
    public function getMoviesByLimit($limit)
    {
        require_once "database/DatabaseMysql.php";
        require_once "models/PeliculaModel.php";
        $pelicula = new PeliculaModel();
        $listaPeliculas = $pelicula->getPeliculasPorLimite($limit);
        return $listaPeliculas;
    }
    /* obtenemos un listado de peliculas por filtro */
    public function getMoviesByFilter($filtros)
    {
        require_once "database/DatabaseMysql.php";
        require_once "models/PeliculaModel.php";
        $pelicula = new PeliculaModel();
        $listaPeliculas = $pelicula->searchMoviesByFilters($filtros);
        return $listaPeliculas;
    }
    /* obtenemos la cantidad de peliculas por pagina */
    public function getMoviesByPageNumber($inicio, $cantidadPeliculas)
    {
        require_once "database/DatabaseMysql.php";
        require_once 'models/PeliculaModel.php';
        $pelicula = new PeliculaModel();
        //peliculas por pagina
        $listaPeliculas = $pelicula->getMoviesByPageNumber($inicio, $cantidadPeliculas);
        //cantidad de peliculas en total
        $cantidadRegistros = $pelicula->pageRowCount;
        //cantidad de paginas segun peliculas
        $cantidadPaginas = ceil($cantidadRegistros / $cantidadPeliculas);

        return [
            "listaPeliculas" => $listaPeliculas,
            "cantidadPaginas" => $cantidadPaginas
        ];
    }

    /* obtenemos los datos de una pelicula por su id */
    public function getMovieById($id)
    {
        require_once 'models/PeliculaModel.php';
        $peliculaModel = new PeliculaModel();
        $pelicula = $peliculaModel->getMovieById($id);
        return $pelicula;
    }

    /* insertamos una pelicula nueva */
    public function insert()
    {
        //creamo el objeto pelicula
        require_once 'entities/Pelicula.php';
        $pelicula = new Pelicula();
        $pelicula->setTitulo($_POST['tituloPelicula']);
        $pelicula->setDescripcion($_POST['descripcionPelicula']);
        $pelicula->setAnio($_POST['anio']);
        $pelicula->setCantidadMeGusta(1);
        $pelicula->setPrecioVenta($_POST['precioVenta']);
        $pelicula->setPrecioAlquiler($_POST['precioAlquiler']);
        $pelicula->setDisponibilidad($_POST['disponibilidad']);
        $pelicula->setPoster($_FILES['posterPelicula']);
        $pelicula->setStock($_POST['stock']);
        $pelicula->setGenero($_POST['genero']);
        // enviamos datos al modelo
        require_once 'models/PeliculaModel.php';
        $peliculaModel = new PeliculaModel();
        /* PDO NO ME GUARDABA LA IMAGEN ASI QUE IMPROVISE ESTE METODO CON MSQLI :C */
        $peliculaModel->insertMovieMysqli($pelicula);
    }
    /* metodo para modificar los datos de la pelicula */
    public function update()
    {
        //$id = $_POST['idPelicula'];
        require_once 'entities/Pelicula.php';
        $pelicula = new Pelicula();
        $pelicula->setIdPelicula($_POST['idPelicula']);
        $pelicula->setTitulo($_POST['tituloPelicula']);
        $pelicula->setDescripcion($_POST['descripcionPelicula']);
        $pelicula->setAnio($_POST['anio']);
        //$pelicula->setCantidadMeGusta(1);
        $pelicula->setPrecioVenta($_POST['precioVenta']);
        $pelicula->setPrecioAlquiler($_POST['precioAlquiler']);
        $pelicula->setDisponibilidad($_POST['disponibilidad']);
        /* $pelicula->setPoster($_FILES['posterPelicula']); */
        $pelicula->setStock($_POST['stock']);
        $pelicula->setGenero($_POST['genero']);
        // enviamos datos al modelo
        require_once 'models/PeliculaModel.php';
        $peliculaModel = new PeliculaModel();
        $peliculaModel->updateMovieMysqli($pelicula);
    }

    /* eliminanos una pelicula mediante el modelo */
    public function delete()
    {
        $id = $_POST['idPelicula'];
        require_once 'models/PeliculaModel.php';
        $peliculaModel = new PeliculaModel();
        $peliculaModel->delete($id);
    }
}
