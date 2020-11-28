<?php require_once 'render/BaseLayout.php'; ?>
<?php require_once 'render/HomeRender.php'; ?>
<?php include_once 'helpers/fechaentrega.php' ?>

<?php BaseLayout::renderHead(); ?>
<?php BaseLayout::renderHeaderAdmin(); ?>

<main class="admin__main movimientos__main">

<div class="amdim__filter">
        <form action="#" method="POST">

            <div class="admin__search">
                <p><strong>Filtrar </strong></p>
                <div class="">
                    <div class="admin__select-container">
                        <select name="anioPelicula" class="admin-select">
                            <option class="admin-select__option" value="" selected>Todas</option>
                            <option class="admin-select__option" value="">Venta</option>
                            <option class="admin-select__option" value="">Alquiler</option>
                        </select>
                        <i class="arrow-down"></i>
                    </div>
                </div>
                
                <button class="admin__btn admin__btn--add" type="submit">
                    Buscar
                </button>

            </div>
        </form>
    </div>

    <table class="admin__table">
        <tr>
            <th class="admin__table-th">#Factura</th>
            <th class="admin__table-th">Fecha</th>
            <th class="admin__table-th">Usuario</th>
            <th class="admin__table-th">Producto</th>
            <!-- <th class="admin__table-th">Cantidad</th> -->
            <th class="admin__table-th">Adquisicion</th>
            <th class="admin__table-th">Total $USD</th>
            <!-- <th class="admin__table-th">Acciones</th> -->
        </tr>
        <?php if (!empty($listaFacturas)) { ?>
            <?php foreach ($listaFacturas as $factura) { ?>
                <tr class="admin__table-tr">
                    <td class="admin__table-td">
                        <strong>IC00<?= $factura['idFactura']; ?></strong>
                    </td>
                    <td class="admin__table-td">
                        <?= $factura['fechaFactura']; ?>
                    </td>
                    <td class="admin__table-td">
                        <?= $factura['correoUsuario']; ?> </td>
                    <td class="admin__table-td">
                        <?= $factura['tituloPelicula']; ?>
                    </td>
                    <!-- <td class="admin__table-td">
                        <?= $factura['cantidad']; ?>
                    </td> -->
                    <td class="admin__table-td">
                        <?= $factura['tipoAdquisicion']; ?>
                    </td>
                    <td class="admin__table-td">
                        <?= $factura['totalFactura']; ?> 
                    </td>
                </tr>
            <?php }
        } else { ?>
        <?php echo "<br><h1 style='margin: 10rem 0;'>No se obtuvieron resultados</h1><br>";
        } ?>
    </table>

</main>
<script src="https://kit.fontawesome.com/79ccb07dd0.js" crossorigin="anonymous"></script>

<?php BaseLayout::renderFooter(); ?>