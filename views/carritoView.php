<?php require_once 'render/BaseLayout.php'; ?>
<?php BaseLayout::renderHead(); ?>
<?php BaseLayout::renderHeader(); ?>

<section class="carrito__container">

    <div class="carrito__title-container">
        <img class="carrito__bolsa-icon" src="<?= BASE_DIR; ?>assets/images/bolsa-compra.svg" alt="bosal compras icono">
        <h1 class="carrito__title">Compra</h1>
    </div>

    <?php if (isset($_SESSION['carrito']['tituloPelicula'])) { ?>
        <table class="carrito__table">
            <tr class="table__tr">
                <th class="table__th">Poster</th>
                <th class="table__th">Titulo</th>
                <th class="table__th">Tipo de aquisicion</th>
                <?php if ($_SESSION['carrito']['adquisicion'] == "Alquiler") { ?>
                    <th class="table__th">Fecha de entrega</th>
                <?php } ?>
                <th class="table__th">Cantidad</th>
                <th class="table__th">Costo unitario</th>
                <th class="table__th">Sub total</th>
            </tr>
            <tr class="table__tr">
                <td class="table__td"><img class="table__poster" src="data:image/jpg;base64,<?= $_SESSION['carrito']['posterPelicula'] ?>" alt="poster de pelicula"></td>
                <td class="table__td"><strong><?= $_SESSION['carrito']['tituloPelicula'] ?></strong></td>
                <td class="table__td"><?= $_SESSION['carrito']['adquisicion'] ?></td>

                <?php if ($_SESSION['carrito']['adquisicion'] == "Alquiler") { ?>
                    <td class="table__td"><?= $_SESSION['carrito']['fechaEntrega'] ?></td>
                <?php } ?>

                <td class="table__td"><?= $_SESSION['carrito']['cantidad'] ?></td>
                <td class="table__td"><?= $_SESSION['carrito']['precioVenta'] ?> $USD</td>
                <td class="table__td"><?= $_SESSION['carrito']['precioVenta'] ?> $USD</td>
            </tr>

            <tr class="table__tr">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="table__total">Total</td>
                <td class="table__monto"><?= $_SESSION['carrito']['precioVenta'] ?> $USD</td>
            </tr>
        </table>
        <form action="<?= BASE_DIR; ?>App/facturar/" method="post">
            <button type="submit" class="carrito__btn-compra">
                Realizar compra &raquo;
            </button>
        </form>

        <a href="<?= BASE_DIR;?>App/index/">
            <button class="carrito__btn-compra carrito__btn-compra--outline">Cancelar</button>
        </a>

    <?php } else { ?>
        <?php header('location: ' . BASE_DIR . 'App/index/'); ?>
    <?php } ?>

</section>




<?php BaseLayout::renderFooter(); ?>