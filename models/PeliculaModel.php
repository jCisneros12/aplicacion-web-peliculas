<?php
require_once 'database/DatabaseMysql.php';

class PeliculaModel extends DatabaseMysql
{
    public $allRowCount = 0;
    public $pageRowCount = 0;
    public $rowCount = 0;

    /* obtenemos todas las peliculas */
    public function getPeliculas()
    {
        try {
            $query = "SELECT idPelicula, tituloPelicula, descripcionPelicula, stock, anioPelicula, cantidadMeGusta, precioVenta,
            precioAlquiler, disponibilidad, posterPelicula, nombreGenero
                      FROM tbl_pelicula INNER JOIN  tbl_genero_pelicula 
                      ON tbl_pelicula.idGeneroPelicula_p=tbl_genero_pelicula.idGeneroPelicula";
            $stmt = $this->conn->prepare($query);
            if ($stmt->execute()) {
                $nRow = $stmt->rowCount();

                if ($nRow > 0) {
                    $resultArray = array();

                    while ($results = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        array_push($resultArray, $results);
                    }
                    //$peliculasJSON = json_encode($resultArray, JSON_PRETTY_PRINT);
                    return $resultArray;
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /* obtenemos una pelicula segun su id */
    public function getMovieById($id)
    {
        try {
            $query = "SELECT idPelicula, tituloPelicula, descripcionPelicula, anioPelicula, cantidadMeGusta, 
                      precioVenta, precioAlquiler, disponibilidad, posterPelicula, nombreGenero, stock, idGeneroPelicula_p
                      FROM tbl_pelicula INNER JOIN  tbl_genero_pelicula 
                      ON tbl_pelicula.idGeneroPelicula_p=tbl_genero_pelicula.idGeneroPelicula
                      WHERE idPelicula=:idPelicula";

            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':idPelicula', $id);

            if ($stmt->execute()) {
                $nRow = $stmt->rowCount();
                if ($nRow > 0) {
                    $movie = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $movie;
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    /* obtenemos todas las peliculas con stock mayores a cero */
    public function getPeliculasPorLimite($limit)
    {
        try {
            $query = "SELECT idPelicula, tituloPelicula, descripcionPelicula, anioPelicula, cantidadMeGusta, precioVenta,
            precioAlquiler, disponibilidad, posterPelicula, nombreGenero
                      FROM tbl_pelicula INNER JOIN  tbl_genero_pelicula 
                      ON tbl_pelicula.idGeneroPelicula_p=tbl_genero_pelicula.idGeneroPelicula WHERE tbl_pelicula.stock>0 LIMIT $limit";
            $stmt = $this->conn->prepare($query);
            if ($stmt->execute()) {
                $nRow = $stmt->rowCount();

                if ($nRow > 0) {
                    $resultArray = array();

                    while ($results = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        array_push($resultArray, $results);
                    }
                    //$peliculasJSON = json_encode($resultArray, JSON_PRETTY_PRINT);
                    return $resultArray;
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    /* obtenemos un rango de peliculas segun parametros de la paginacion */
    public function getMoviesByPageNumber($inicio, $cantidad)
    {
        try {
            $query = "SELECT SQL_CALC_FOUND_ROWS idPelicula, tituloPelicula, descripcionPelicula, anioPelicula, cantidadMeGusta, 
            precioVenta, precioAlquiler, disponibilidad, posterPelicula, nombreGenero
                      FROM tbl_pelicula INNER JOIN  tbl_genero_pelicula 
                      ON tbl_pelicula.idGeneroPelicula_p=tbl_genero_pelicula.idGeneroPelicula LIMIT $inicio, $cantidad";
            $stmt = $this->conn->prepare($query);
            if ($stmt->execute()) {
                $nRow = $stmt->rowCount();
                /* $this->rowCount = $nRow; */
                /* obtenemos la cantidad de peliculas */
                $this->pageRowCount = $this->getRowsCount();
                if ($nRow > 0) {
                    $resultArray = array();

                    while ($results = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        array_push($resultArray, $results);
                    }
                    return $resultArray;
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /* obtenemos la cantidad total de peliculas registradas*/
    public function getRowsCount()
    {
        try {
            $query = "SELECT FOUND_ROWS() as total";
            $stmt = $this->conn->prepare($query);
            if ($stmt->execute()) {
                $totalRows = $stmt->fetch()['total'];
                return $totalRows;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /* buscar segun multiples filtros */
    public function searchMoviesByFilters($filtros = "")
    {
        try {
            $sql = "SELECT idPelicula, tituloPelicula, descripcionPelicula, stock, anioPelicula, cantidadMeGusta, 
                      precioVenta, precioAlquiler, disponibilidad, posterPelicula, nombreGenero
                      FROM tbl_pelicula INNER JOIN  tbl_genero_pelicula 
                      ON tbl_pelicula.idGeneroPelicula_p=tbl_genero_pelicula.idGeneroPelicula ";
            //concatenamos los flitros a la consulta (si los hay)
            if (!empty($filtros)) {
                $sql = $this->injectFilters($sql, $filtros);
            }
            $stmt = $this->conn->prepare($sql);
            //echo "<strong>". $sql . "</strong>";
            if ($stmt->execute()) {
                $nRow = $stmt->rowCount();

                if ($nRow > 0) {
                    $resultArray = array();

                    while ($results = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        array_push($resultArray, $results);
                    }
                    //print_r($resultArray);
                    return $resultArray;
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    /* se inyectan los filtros proporcionados a la consulta */
    private function injectFilters($sql, $filtros)
    {
        $i = 0;
        //inyectamos filtros a la consulta
        foreach ($filtros as $filtroKey => $filtro) {
            $sql = $sql . ($i == 0 ? " WHERE " : "");
            $sql = $sql . $filtroKey  . ($i < count($filtros) ? " LIKE " : "");
            $sql = $sql . " '" . $filtro . "%' " . (($i < count($filtros) - 1) ? " AND " : "");
            $i++;
        }

        return $sql;
    }

    /* metodo para actualizar el stock de una pelicula */
    public function updateStock($idPelicula, $cantidad, $movimiento)
    {
        try {
            $query = "UPDATE tbl_pelicula 
                      SET  stock = stock + :cantidad
                      WHERE idPelicula=:idPelicula";

            //corroboramos si el tipo de movimiento es entrada o salida
            $cantidad = ($movimiento == "Salida") ? $cantidad * (-1) : $cantidad;

            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':idPelicula', $idPelicula);
            $stmt->bindValue(':cantidad', $cantidad);
            $stmt->execute();
            /* if ($stmt->execute()) {
                //header('location: ' . BASE_DIR . 'App/index/');
            } */
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function insertMovie(Pelicula $pelicula)
    {
        try {
            $query = "INSERT INTO tbl_pelicula (tituloPelicula, descripcionPelicula, anioPelicula, cantidadMeGusta,
            precioVenta, precioAlquiler, disponibilidad, posterPelicula, stock, idGeneroPelicula_p) 
                VALUES (:tituloPelicula, :descripcionPelicula, :anioPelicula, :cantidadMeGusta, :precioVenta, :precioAlquiler,
                :disponibilidad, :posterPelicula, :stock, :idGeneroPelicula_p)";

            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':tituloPelicula', $pelicula->getTitulo());
            $stmt->bindValue(':descripcionPelicula', $pelicula->getDescripcion());
            $stmt->bindValue(':anioPelicula', $pelicula->getAnio());
            $stmt->bindValue(':cantidadMeGusta', $pelicula->getCantidadMeGusta());
            $stmt->bindValue(':precioVenta', $pelicula->getPrecioVenta());
            $stmt->bindValue(':precioAlquiler', $pelicula->getPrecioAlquiler());
            $stmt->bindValue(':disponibilidad', $pelicula->getDisponibilidad());
            $stmt->bindValue(':posterPelicula', $pelicula->getPoster());
            $stmt->bindValue(':stock', $pelicula->getStock());
            $stmt->bindValue(':idGeneroPelicula_p', $pelicula->getGenero());

            if ($stmt->execute()) {
                header('location: ' . BASE_DIR . 'Admin/dashboard/');
                //echo "REGISTRO EXITOSO!";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    /* PDO NO ME GUARDABA LA IMAGEN ASI QUE IMPROVISE ESTE METODO CON MSQLI :C */
    public function insertMovieMysqli(Pelicula $pelicula)
    {
        $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $tituloPelicula = $pelicula->getTitulo();
        $descripcionPelicula = $pelicula->getDescripcion();
        $anioPelicula = $pelicula->getAnio();
        $cantidadMeGusta = $pelicula->getCantidadMeGusta();
        $precioVenta = $pelicula->getPrecioVenta();
        $precioAlquiler = $pelicula->getPrecioAlquiler();
        $disponibilidad = $pelicula->getDisponibilidad();
        $posterPelicula = $pelicula->getPoster();
        $stock = $pelicula->getStock();
        $idGeneroPelicula_p = $pelicula->getGenero();

        $query = "INSERT INTO tbl_pelicula (tituloPelicula, descripcionPelicula, anioPelicula, cantidadMeGusta,
            precioVenta, precioAlquiler, disponibilidad, posterPelicula, stock, idGeneroPelicula_p) 
            VALUES ('$tituloPelicula', '$descripcionPelicula', '$anioPelicula', '$cantidadMeGusta', '$precioVenta', '$precioAlquiler',
                '$disponibilidad', '$posterPelicula', '$stock', '$idGeneroPelicula_p')";

        $result = mysqli_query($con, $query);

        if ($result) {
            header('location: ' . BASE_DIR . 'Admin/dashboard/');
        } else {
            header('location: ' . BASE_DIR . 'Admin/pelicula/');
        }
    }

    public function updateMovieMysqli(Pelicula $pelicula)
    {
        $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $idPelicula = $pelicula->getIdPelicula();
        $tituloPelicula = $pelicula->getTitulo();
        $descripcionPelicula = $pelicula->getDescripcion();
        $anioPelicula = $pelicula->getAnio();
        //$cantidadMeGusta = $pelicula->getCantidadMeGusta();
        $precioVenta = $pelicula->getPrecioVenta();
        $precioAlquiler = $pelicula->getPrecioAlquiler();
        $disponibilidad = $pelicula->getDisponibilidad();
        /* $posterPelicula = $pelicula->getPoster(); */
        $stock = $pelicula->getStock();
        $idGeneroPelicula_p = $pelicula->getGenero();

        $query = "UPDATE tbl_pelicula 
        SET tituloPelicula='$tituloPelicula', descripcionPelicula='$descripcionPelicula', anioPelicula ='$anioPelicula', 
        precioVenta='$precioVenta', precioAlquiler='$precioAlquiler', disponibilidad='$disponibilidad', 
        stock='$stock', idGeneroPelicula_p='$idGeneroPelicula_p'
        WHERE idPelicula='$idPelicula'";

        $result = mysqli_query($con, $query);

        if ($result) {
            header('location: ' . BASE_DIR . 'Admin/dashboard/');
        } else {
            header('location: ' . BASE_DIR . 'Admin/pelicula/');
        }
    }

    public function delete($id)
    {
        try {
            $query = "DELETE FROM tbl_pelicula 
            WHERE idPelicula=:idPelicula";

            $stmt = $this->conn->prepare($query);
            $stmt->bindValue(':idPelicula', $id);
            $stmt->execute();
            if ($stmt->execute()) {
                header('location: ' . BASE_DIR . 'Admin/dashboard/');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
