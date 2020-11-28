<?php
require_once 'database/DatabaseMysql.php';

class FacturaModel extends DatabaseMysql
{
    /* metodo para registrar una nueva compra (factura) */
    public function createFactura(Factura $factura, $detalleCompra)
    {
        try {
            $query = "INSERT INTO tbl_factura (idUsuario_fac, fechaFactura, totalFactura) 
                VALUES (:idUsuario, :fecha, :total)";

            $stmt = $this->conn->prepare($query);

            $stmt->bindValue(':idUsuario', $factura->getIdUsuario());
            $stmt->bindValue(':fecha', $factura->getFecha());
            $stmt->bindValue(':total', $factura->getTotal());

            if ($stmt->execute()) {
                //obtenemos el id de la factuira creada
                $lastId = "SELECT LAST_INSERT_ID()";
                $stmtId = $this->conn->prepare($lastId);
                if ($stmtId->execute()) {
                    $idFactura = $stmtId->fetchColumn();
                    $this->createDetalleFactura($idFactura, $detalleCompra);
                    $facturaCreada = $idFactura;
                }
                //$facturaCreada = $stmt->fetch(PDO::FETCH_ASSOC);
                return $facturaCreada;
                //header('location: ' . BASE_DIR . 'App/login/');
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    /* metodo para crear el detalle de la factura */
    public function createDetalleFactura($idFactura, $detalleCompra)
    {
        try {
            $query = "INSERT INTO tbl_detalle_factura (idFactura_df, idPelicula_df, cantidad,
                precioUnitario,tipoAdquisicion ,subTotal) 
                VALUES (:idFactura, :idPelicula, :cantidad, :precioUnitario, :tipoAdquisicion, :subTotal)";

            $stmt = $this->conn->prepare($query);

            $stmt->bindValue(':idFactura', $idFactura);
            $stmt->bindValue(':idPelicula', $detalleCompra['idPelicula']);
            $stmt->bindValue(':cantidad', $detalleCompra['cantidad']);
            $stmt->bindValue(':precioUnitario', $detalleCompra['precioVenta']);
            $stmt->bindValue(':tipoAdquisicion', $detalleCompra['adquisicion']);
            $stmt->bindValue(':subTotal', $detalleCompra['precioVenta']);

            if ($stmt->execute()) {

                //actualizamos stock
                require_once 'models/PeliculaModel.php';
                $peliculaModel = new PeliculaModel();
                $peliculaModel->updateStock(
                    $detalleCompra['idPelicula'],
                    $detalleCompra['cantidad'],
                    "Salida"
                );

                //$detalleFactura = $stmt->fetch(PDO::FETCH_ASSOC);

                //creamos el registro de alquiler
                if ($detalleCompra['adquisicion'] == "Alquiler") {
                    $this->createAlquiler($detalleCompra);
                } /* else {
                    //header('location: ' . BASE_DIR . 'App/factura/');
                } */
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /* metodo para crear el registro de alquiler */
    public function createAlquiler($detalleCompra)
    {
        try {
            $query = "INSERT INTO tbl_alquiler (idUsuario_alq, idPelicula_alq, estadoAlquiler, fechaInicio, 
                fechaFin, multaAlquiler) 
                VALUES (:idUsuario, :idPelicula, :estado, :fechaInicio, :fechaFin, :multa)";

            $stmt = $this->conn->prepare($query);

            $stmt->bindValue(':idUsuario', $detalleCompra['idUsuario']);
            $stmt->bindValue(':idPelicula', $detalleCompra['idPelicula']);
            $stmt->bindValue(':estado', true);
            $stmt->bindValue(':fechaInicio', $detalleCompra['fechaInicio']);
            $stmt->bindValue(':fechaFin', $detalleCompra['fechaEntrega']);
            $stmt->bindValue(':multa', 0.0);
            $stmt->execute();
            /* if ($stmt->execute()) {
                header('location: ' . BASE_DIR . 'App/index/');
            } */
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    
    public function getAllFacturas()
    {
        try {
            $query = "SELECT idFactura, fechaFactura, totalFactura, correoUsuario, 
            cantidad, tipoAdquisicion, tituloPelicula 
            FROM tbl_factura tf 
            INNER JOIN tbl_usuario tu ON tf.idUsuario_fac=tu.idUsuario
            INNER JOIN tbl_detalle_factura td ON td.idFactura_df=tf.idFactura 
            INNER JOIN tbl_pelicula tp ON td.idPelicula_df=tp.idPelicula";
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
}
