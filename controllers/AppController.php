<?php

class AppController
{
    /* crear una funcion para cada vista */

    public function index()
    {
        require_once 'controllers/PeliculaController.php';
        $pelicula = new PeliculaController();
        $listaPeliculas = $pelicula->getMoviesByLimit(20);
        require_once 'views/home.php';
    }

    //ruta para la vista de login
    public function login()
    {
        require_once 'views/loginView.php';
    }
    //ruta para la vista de registro
    public function register()
    {
        require_once 'views/registerView.php';
    }
    //ruta para la vista de peliculas
    public function peliculas()
    {
        require_once 'controllers/PeliculaController.php';
        $pelicula = new PeliculaController();
        $listaPeliculas = $pelicula->getAllMovies();
        require_once 'views/peliculasView.php';
    }
    //ruta para la vista de los detalles de la pelicula
    public function pelicula()
    {
        if (isset($_POST['idPelicula'])) {
            $idPelicula = $_POST['idPelicula'];
            require_once 'controllers/PeliculaController.php';
            $peliculaController = new PeliculaController();
            $pelicula = $peliculaController->getMovieById($idPelicula);
            require_once 'views/peliculaView.php';
        } else {
            header('location:' . BASE_DIR . 'App/index/');
        }
    }
    //ruta para la vista del carrito
    public function carrito()
    {
        if (!isset($_SESSION['idUsuario'])) {
            header('location: ' . BASE_DIR . 'App/login/');
        } 
        if ($_POST) {
            $_SESSION['carrito'] = [
                "idPelicula" => $_POST["idPelicula"],
                "posterPelicula" => $_POST["posterPelicula"],
                "tituloPelicula" => $_POST["tituloPelicula"],
                "adquisicion" => $_POST["adquisicion"],
                "fechaInicio" => $_POST["fechaInicio"],
                "fechaEntrega" => $_POST["fechaEntrega"],
                "cantidad" => $_POST["cantidad"],
                "precioVenta" => $_POST["precioVenta"],
                "correoUsuario" => $_SESSION["correo"],
                "idUsuario" => $_SESSION['idUsuario']
            ];
            require_once 'views/carritoView.php';
        } else {
            header('location: ' . BASE_DIR . 'App/peliculas/');
        }
    }
    //ruta para la vista facturar
    public function facturar()
    {
        //creamos la factura
        require_once 'entities/Factura.php';
        $factura = new Factura();
        $factura->setIdUsuario($_SESSION['carrito']['idUsuario']);
        $factura->setFecha($_SESSION['carrito']['fechaInicio']);
        $factura->setTotal($_SESSION['carrito']['precioVenta']);
        //comunicamos al modelo el registro de una nueva factura
        require_once 'models/FacturaModel.php';
        $facturaModel = new FacturaModel();
        $datosCompra = $_SESSION['carrito'];
        $datosFactura = $facturaModel->createFactura($factura, $datosCompra);
        //pintamos la vista con los datos de la factura
        require_once 'views/facturaView.php';
    }
    //no me acuerdo para que esta hice esta jaja
    public function factura()
    {
        $datosCompra = $_SESSION['carrito'];
        require_once 'views/facturaView.php';
    }
}
