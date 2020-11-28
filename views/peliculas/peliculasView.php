<section class="movies">

    <div class="movies__filtro">
        <div class="movies__filtro-content">
            <p class="movies__text">Filtro</p>
            <div class="select-container">
                <select name="select-filtro" class="select">
                    <option class="select__option" value="value1" selected>Populares</option>
                    <option class="select__option" value="value2">Más gustadas</option>
                    <option class="select__option" value="value3">Recientes</option>
                </select>
                <i class="arrow-down"></i>
            </div>
            <button class="button">Filtrar</button>
        </div>
    </div>
    <br>

    <form action="<?= MOVIES_DIR; ?>" method="POST">

        <div class="movies__search">
            <div>
                <p class="movies__text">Titulo</p>
                <input class="movies__input-text" type="text" name="tituloPelicula" id="" placeholder="Ingrese un título...">
            </div>
            <div class="">
                <p class="movies__text">Año</p>
                <div class="select-container">
                    <select name="anioPelicula" class="select">
                        <option class="select__option" value="" selected>todos</option>
                        <option class="select__option" value="2015">2015</option>
                        <option class="select__option" value="2016">2016</option>
                        <option class="select__option" value="2017">2017</option>
                        <option class="select__option" value="2018">2018</option>
                        <option class="select__option" value="2019">2019</option>
                        <option class="select__option" value="2020">2020</option>
                    </select>
                    <i class="arrow-down"></i>
                </div>
            </div>
            <div>
                <p class="movies__text">Género</p>
                <div class="select-container">
                    <!-- name="nombreGenero" -->
                    <select name="nombreGenero" class="select">
                        <option class="select__option" value="" selected>Todos</option>
                        <option class="select__option" value="Terror">Terror</option>
                        <option class="select__option" value="Accion">Accion</option>
                        <option class="select__option" value="Fantasía">Fantasía</option>
                        <option class="select__option" value="Suspenso">Suspenso</option>
                        <option class="select__option" value="Romance">Romance</option>
                        <option class="select__option" value="Drama">Drama</option>
                        <option class="select__option" value="Ciencia ficción">Ciencia ficción</option>
                        <option class="select__option" value="Aventura">Aventura</option>
                    </select>
                    <i class="arrow-down"></i>
                </div>
            </div>

            <div class="button__container">
                <button class="button" type="submit">
                    Buscar
                </button>
            </div>

        </div>
    </form>

    <div class="movies-list">
        <?php if (!empty($listaPeliculas)) { ?>
            <?php foreach ($listaPeliculas as $pelicula) { ?>
                <div class="card">
                    <form action="<?= BASE_DIR; ?>App/pelicula/" method="POST">
                        <div class="card__image-container">
                            <input type="text" name="idPelicula" value="<?= $pelicula["idPelicula"] ?>" hidden>
                            <button type="submit" class="button-none">
                                <img class="card__img" src="data:image/jpg;base64,<?= base64_encode($pelicula['posterPelicula']); ?>" alt="">
                            </button>
                        </div>
                    </form>
                    <p class="card__title"><?= $pelicula['tituloPelicula']; ?></p>
                    <div class="card__details">
                        <p class="details__anio"><?= $pelicula['anioPelicula']; ?></p>
                        <div class="separator"></div>
                        <p class="details__gender"><?= $pelicula['nombreGenero']; ?></p>
                        <div class="details__like-container">
                            <img class="details__heart" src="<?= BASE_DIR; ?>assets/images/slide/heart.svg" alt="imagen de corazon">
                            <p class="details__likes"><?= $pelicula['cantidadMeGusta']; ?></p>
                        </div>
                    </div>
                    <div class="card__buttons">
                        <!-- form -->
                        <form action="<?= BASE_DIR; ?>App/carrito/" method="POST">
                            <!-- datos de la pelicula -->
                            <input type="text" value="<?= $pelicula["idPelicula"] ?>" name="idPelicula" hidden>
                            <input type="text" value="<?= base64_encode($pelicula["posterPelicula"]) ?>" name="posterPelicula" hidden>
                            <input type="text" value="<?= $pelicula["tituloPelicula"] ?>" name="tituloPelicula" hidden>
                            <input type="text" value="Alquiler" name="adquisicion" hidden>
                            <input type="text" value="<?= $fechaInicio ?>" name="fechaInicio" hidden>
                            <input type="text" value="<?= $fechaEntrega ?>" name="fechaEntrega" hidden>
                            <input type="text" value="1" name="cantidad" hidden>
                            <input type="text" value="<?= $pelicula["precioVenta"] ?>" name="precioVenta" hidden>
                            <button type="submit" class="button button--small">
                                + Alquilar
                            </button>
                        </form>
                        <!-- form -->
                        <form action="<?= BASE_DIR; ?>App/carrito/" method="POST">
                            <!-- datos de la pelicula -->
                            <input type="text" value="<?= $pelicula["idPelicula"] ?>" name="idPelicula" hidden>
                            <input type="text" value="<?= base64_encode($pelicula["posterPelicula"]) ?>" name="posterPelicula" hidden>
                            <input type="text" value="<?= $pelicula["tituloPelicula"] ?>" name="tituloPelicula" hidden>
                            <input type="text" value="Compra" name="adquisicion" hidden>
                            <input type="text" value="<?= $fechaInicio ?>" name="fechaInicio" hidden>
                            <input type="text" value="<?= $fechaEntrega ?>" name="fechaEntrega" hidden>
                            <input type="text" value="1" name="cantidad" hidden>
                            <input type="text" value="<?= $pelicula["precioVenta"] ?>" name="precioVenta" hidden>
                            <!-- end datos pelicula -->
                            <button type="submit" class="button button--small button--outline">
                                + Comprar
                            </button>
                        </form>
                    </div>

                </div>
            <?php }
        } else { ?>
        <?php echo "<br><h1 style='margin: 10rem 0;'>No se obtuvieron resultados</h1><br>";
        } ?>

    </div>

    <div class="pagination <?= !isset($cantidadPaginas) ? "disable" : "" ?>">
        <!-- class="disable" -->
        <a href="<?= MOVIES_DIR; ?><?= $pagina - 1 ?>" class="paginacion__a <?= $pagina == 1 ? "disable" : "" ?>">
            <div class="pagination__pagina">
                &laquo; anterior
            </div>
        </a>

        <?php for ($i = 1; $i <= $cantidadPaginas; $i++) { ?>
            <?php if ($pagina == $i) { ?>
                <a href="<?= MOVIES_DIR; ?><?= $i ?>" class="paginacion__a">
                    <div class="pagination__pagina pagination__pagina--selected">
                        <?php echo $i ?>
                    </div>
                </a>
            <?php } else { ?>
                <a href="<?= MOVIES_DIR; ?><?= $i ?>" class="paginacion__a">
                    <div class="pagination__pagina">
                        <?php echo $i ?>
                    </div>
                </a>
            <?php } ?>
        <?php } ?>

        <a href="<?= MOVIES_DIR; ?><?= $pagina + 1 ?>" class="paginacion__a <?= $pagina == $cantidadPaginas ? "disable" : "" ?>">
            <div class="pagination__pagina">
                siguiente &raquo;
            </div>
        </a>
    </div>

</section>