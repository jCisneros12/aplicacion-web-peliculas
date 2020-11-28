<?php
require_once 'controllers/PeliculaController.php';
require_once 'models/FacturaModel.php';

class AdminController
{
    //vista principal del panel admin
    public function dashboard()
    {

        

        if (($_SESSION['sessionRol']) == 1) {
            /* obtenemos los filtros si se esque se enviaron */
            $listaPeliculas = new PeliculaController();
            if (($_POST)) {
                $filtro = [
                    "tituloPelicula" => $_POST["tituloPelicula"],
                    "anioPelicula" => $_POST["anioPelicula"],
                    "nombreGenero" => $_POST["nombreGenero"],
                    "disponibilidad" => $_POST["disponibilidad"]
                ];
                //print_r($filtros);
                $listaPeliculas = $listaPeliculas->getMoviesByFilter($filtro);
            } else {
                //solicitamos el listado de peliculas
                $pelicula = new PeliculaController();
                $listaPeliculas = $pelicula->getAllMovies();
            }
            require_once 'views/admin/dashboardView.php';
        } else {
            header('location: ' . BASE_DIR . 'App/index/');
        }
    }
    //vista para mostrar, insertar(segun el $action) una nueva pelicula
    public function pelicula()
    {
        //otenemos de la tabala pelicula la accion seleccionada
        $accionSeleccionada = $_POST['actionSelected'];

        $action = null;
        if (isset($_POST['action'])) {
            $action = $_POST['action'];
        }
        $pelicula = null;
        //mediante las acciones seleccionada gestionamos la vista
        if (isset($_POST['idPelicula'])) {
            $idPelicula = $_POST['idPelicula'];
            $peliculaController = new PeliculaController();
            $pelicula = $peliculaController->getMovieById($idPelicula);
        }
        require_once 'views/admin/pelicula.php';
    }
    //ruta para modificar los datos de una pelicula
    public function edit()
    {
        $action = null;
        if (isset($_POST['action'])) {
            $action = $_POST['action'];
        }

        if (isset($_POST['idPelicula'])) {
            $idPelicula = $_POST['idPelicula'];
            $peliculaController = new PeliculaController();
            $pelicula = $peliculaController->getMovieById($idPelicula);
            require_once 'views/admin/pelicula.php';
        } else {
            header('location:' . BASE_DIR . 'Admin/dashboard/');
        }
    }

    /* ruta para la vista de movimientos (facturas) */
    public function movimientos(){
        //se obtienen los datos de los movimientos (faturas)
        $facturaModel = new FacturaModel();
        $listaFacturas = $facturaModel->getAllFacturas();
        //mostramos la vista con los datos de $listaFacturas
        require_once 'views/admin/movimientos.php';
    }
}
