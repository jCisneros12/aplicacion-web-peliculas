<?php require_once 'render/BaseLayout.php'; ?>
<?php require_once 'render/HomeRender.php'; ?>
<?php include_once 'helpers/fechaentrega.php' ?>

<?php BaseLayout::renderHead(); ?>
<?php BaseLayout::renderHeaderAdmin(); ?>


<main class="admin__main">
    <h1 class="admin__title">Películas</h1>

    <!-- formularios para filtrar -->
    <div class="amdim__filter">
        <form action="<?= BASE_DIR ?>Admin/pelicula/" method="post">
            <input type="text" name="actionSelected" value="insertar" hidden>
            <button class="admin__btn admin__btn--add" type="submit">
                <i class="fas fa-plus"></i> Añadir película
            </button>
        </form>

        <form action="<?= BASE_DIR; ?>Admin/dashboard/" method="POST">

            <div class="admin__search">

                <div>
                    <input class="admin__input-text" type="text" name="tituloPelicula" id="" placeholder="Ingrese un título...">
                </div>
                <div class="">
                    <div class="admin__select-container">
                        <select name="anioPelicula" class="admin-select">
                            <option class="admin-select__option" value="" selected>Año</option>
                            <option class="admin-select__option" value="2015">2015</option>
                            <option class="admin-select__option" value="2016">2016</option>
                            <option class="admin-select__option" value="2017">2017</option>
                            <option class="admin-select__option" value="2018">2018</option>
                            <option class="admin-select__option" value="2019">2019</option>
                            <option class="admin-select__option" value="2020">2020</option>
                        </select>
                        <i class="arrow-down"></i>
                    </div>
                </div>
                <div>
                    <div class="admin__select-container">
                        <!-- name="nombreGenero" -->
                        <select name="nombreGenero" class="admin-select">
                            <option class="admin-select__option" value="" selected>Género</option>
                            <option class="admin-select__option" value="Terror">Terror</option>
                            <option class="admin-select__option" value="Accion">Accion</option>
                            <option class="admin-select__option" value="Fantasía">Fantasía</option>
                            <option class="admin-select__option" value="Suspenso">Suspenso</option>
                            <option class="admin-select__option" value="Romance">Romance</option>
                            <option class="admin-select__option" value="Drama">Drama</option>
                            <option class="admin-select__option" value="Ciencia ficción">Ciencia ficción</option>
                            <option class="admin-select__option" value="Aventura">Aventura</option>
                        </select>
                        <i class="arrow-down"></i>
                    </div>
                </div>
                <div>
                    <div class="admin__select-container">
                        <!-- name="nombreGenero" -->
                        <select name="disponibilidad" class="admin-select">
                            <option class="admin-select__option" value="disponible" selected>Dísponible</option>
                            <option class="admin-select__option" value="no disponible">No disponible</option>
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


    <!-- tabla peliculas -->

    <table class="admin__table">
        <tr>
            <th class="admin__table-th">Poster</th>
            <th class="admin__table-th">Título</th>
            <th class="admin__table-th">Género</th>
            <th class="admin__table-th">Año</th>
            <!-- <th class="admin__table-th">Me gusta</th> -->
            <th class="admin__table-th">Precio de venta</th>
            <th class="admin__table-th">Precio de alquiler</th>
            <th class="admin__table-th">Existencia</th>
            <th class="admin__table-th">Acciones</th>
        </tr>
        <?php if (!empty($listaPeliculas)) { ?>
            <?php foreach ($listaPeliculas as $pelicula) { ?>
                <tr class="admin__table-tr">
                    <td class="admin__table-td">
                        <img class="admin__table-poster" src="data:image/jpg;base64,<?= base64_encode($pelicula['posterPelicula']); ?>">
                    </td>
                    <td class="admin__table-td">
                        <strong><?= $pelicula['tituloPelicula']; ?></strong>
                    </td>
                    <td class="admin__table-td"><?= $pelicula['nombreGenero']; ?></td>
                    <td class="admin__table-td"><?= $pelicula['anioPelicula']; ?></td>
                    <!-- <td class="admin__table-td"><?= $pelicula['cantidadMeGusta']; ?></td> -->
                    <td class="admin__table-td"><?= $pelicula["precioVenta"] ?></td>
                    <td class="admin__table-td"><?= $pelicula["precioAlquiler"] ?></td>
                    <td class="admin__table-td"><?= $pelicula["stock"] ?></td>
                    <td class="admin__table-td admin__table-actions">
                        <form action="<?= BASE_DIR ?>Admin/pelicula/" method="POST">
                            <input type="text" name="idPelicula" value="<?= $pelicula["idPelicula"] ?>" hidden>
                            <input type="text" name="action" value="update" hidden>
                            <input type="text" name="actionSelected" value="actualizar" hidden>

                            <button class="btn__edit">
                                <i class="far fa-edit">Editar</i>
                            </button>
                        </form>
                        <form action="<?= BASE_DIR ?>Admin/pelicula/" method="post">
                            <input type="text" name="idPelicula" value="<?= $pelicula["idPelicula"] ?>" hidden>
                            <input type="text" name="action" value="show" hidden>
                            <input type="text" name="actionSelected" value="actualizar" hidden>
                            <button class="btn__view">
                                <i class="far fa-eye">Ver</i>
                            </button>
                        </form>

                        <form action="<?= BASE_DIR ?>Pelicula/delete/" method="post">
                            <input type="text" name="idPelicula" value="<?= $pelicula["idPelicula"] ?>" hidden>
                            <input type="text" name="action" value="delete" hidden>
                            <input type="text" name="actionSelected" value="eliminar" hidden>
                            <button class="btn__delete">
                                <i class="fas fa-trash-alt">Borrar</i>
                            </button>
                        </form>

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