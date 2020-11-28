<?php require_once 'render/BaseLayout.php'; ?>
<?php BaseLayout::renderHead(); ?>
<?php BaseLayout::renderHeader(); ?>


<main class="factura-container">
    <div class="factura">
        <div class="factura__logo">
            <img class="factura__logo-icon" src="<?= BASE_DIR;?>assets/images/logo-pelicula-pagina.png" alt="">
            <p class="factura__logo-nombre">Infinity Cinema</p>
        </div>
        <h1 class="factura__negocio">Infinity Cinema</h1>
        <h2 class="factura__n-factura">#Facura: IC000<?= $datosFactura ?></h2>
        <p class="factura__usuario">Usuario: <?= $datosCompra['correoUsuario'] ?></p>
        <p class="factura__fecha">Fecha de compra: <?= $datosCompra['fechaInicio'] ?></p>
        <div class="factura__productos">
            <table class="factura__table">
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Sub total</th>
                </tr>
                <tr>
                    <th><?= $datosCompra['tituloPelicula'] ?></th>
                    <th><?= $datosCompra['cantidad'] ?></th>
                    <th><?= $datosCompra['precioVenta'] ?></th>
                </tr>
                <tr class="factura-table__total">
                    <th></td>
                    <th>Total</td>
                    <th><?= $datosCompra['precioVenta'] ?></td>
                </tr>
            </table>
        </div>
    </div>

    <a class="factura__link" href="<?= BASE_DIR; ?>App/index/">Volver a inicio</a>

</main>



<?php BaseLayout::renderFooter(); ?>