<div class="admin__info-movie">
    <div class="admin__movie-img">
        <img class="admin__movie-image" src="<?= BASE_DIR ?>assets/images/select-img.png" alt="poster pelicula">
        <div class="btn-file">
            <input class="input-file" type="file" name="posterPelicula">
            <p class="file-text"> <i class="fas fa-upload"></i> Selecionar poster</p>
        </div>
    </div>
    <div class="admin__movie-data">
        <label for="">Título</label>
        <div class="admin__movie-input"><input class="movie-input" type="text" name="tituloPelicula" id=""></div>
        <label for="">Genero</label>
        <div class="admin__movie-input">
            <div class="select-container">
                <!-- name="nombreGenero" -->
                <select name="genero" class="movie-input movie-select">
                    <option value="1" selected>Ninguno</option>
                    <option value="1">Accion</option>
                    <option value="8">Aventura</option>
                    <option value="7">Ciencia ficción</option>
                    <option value="9">Comedia</option>
                    <option value="6">Drama</option>
                    <option value="3">Fantasia</option>
                    <option value="5">Romance</option>
                    <option value="4">Suspenso</option>
                    <option value="2">Terror</option>
                </select>
                <i class="arrow-down"></i>
            </div>
        </div>
        <label for="">Disponibilidad</label>
        <div class="admin__movie-input">
            <div class="select-container">
                <!-- name="nombreGenero" -->
                <select name="disponibilidad" class="movie-input movie-select">
                    <option value="disponible" selected>Disponible</option>
                    <option value="no disponible">No disponible</option>
                </select>
                <i class="arrow-down"></i>
            </div>
        </div>
        <label for="">Año</label>
        <div class="admin__movie-input"><input class="movie-input" type="number" step="any" name="anio" id=""></div>
        <label for="">Precio de venta $USD</label>
        <div class="admin__movie-input"><input class="movie-input" type="number" step="any" name="precioVenta" id=""></div>
        <label for="">Precio del alquiler $USD</label>
        <div class="admin__movie-input"><input class="movie-input" type="number" step="any" name="precioAlquiler" id=""></div>
        <label for="">Stock</label>
        <div class="admin__movie-input"><input class="movie-input" type="number" name="stock" id=""></div>
        <label for="">Descripción</label>
        <div class="admin__movie-input">
            <textarea class="movie-input" type="text" rows="5" name="descripcionPelicula"></textarea>
        </div>
    </div>
</div>








<!-- -------------------------------- -->

<!-- Formulario para los datos de la pelicula -->
<form action="<?= BASE_DIR; ?>Pelicula/<?= ($action != "update") ? "insert" : "update" ?>/" method="POST" enctype="multipart/form-data">
        <!-- Si se han manadado datos (para editar) llenamos el formulario -->
        <?php if (isset($pelicula) && !empty($pelicula)) { ?>
            <div class="admin__info-movie">
                <div class="admin__movie-img">
                    <img class="admin__movie-image" src="data:image/jpg;base64,<?= base64_encode($pelicula['posterPelicula']); ?>" alt=" poster pelicula">
                    <div class="btn-file" <?= ($action != null) ? "hidden" : "" ?>>
                        <input class="input-file" type="file" name="posterPelicula" value="<?= $pelicula['posterPelicula']; ?>">
                        <p class="file-text"> <i class="fas fa-upload"></i> Selecionar poster</p>
                    </div>
                </div>

                <div class="admin__movie-data">
                    <label for="">Título</label>
                    <div class="admin__movie-input">
                        <input class="movie-input" type="text" name="tituloPelicula" id="" value="<?php echo $pelicula['tituloPelicula']; ?>" <?= ($action == "show") ? "readonly" : "" ?>>
                    </div>
                    <label for="">Genero</label>
                    <div class="admin__movie-input">
                        <div class="select-container">
                            <!-- name="nombreGenero" -->
                            <select name="genero" class="movie-input movie-select" <?= ($action == "show") ? "disabled" : "" ?>>
                                <option value="1">Ninguno</option>
                                <option value="1" <?= $pelicula['idGeneroPelicula_p'] == 1 ? "selected" : "" ?>>Accion</option>
                                <option value="8" <?= $pelicula['idGeneroPelicula_p'] == 8 ? "selected" : "" ?>>Aventura</option>
                                <option value="7" <?= $pelicula['idGeneroPelicula_p'] == 7 ? "selected" : "" ?>>Ciencia ficción</option>
                                <option value="9" <?= $pelicula['idGeneroPelicula_p'] == 9 ? "selected" : "" ?>>Comedia</option>
                                <option value="6" <?= $pelicula['idGeneroPelicula_p'] == 6 ? "selected" : "" ?>>Drama</option>
                                <option value="3" <?= $pelicula['idGeneroPelicula_p'] == 3 ? "selected" : "" ?>>Fantasia</option>
                                <option value="5" <?= $pelicula['idGeneroPelicula_p'] == 5 ? "selected" : "" ?>>Romance</option>
                                <option value="4" <?= $pelicula['idGeneroPelicula_p'] == 4 ? "selected" : "" ?>>Suspenso</option>
                                <option value="2" <?= $pelicula['idGeneroPelicula_p'] == 2 ? "selected" : "" ?>>Terror</option>
                            </select>
                            <i class="arrow-down"></i>
                        </div>
                    </div>
                    <label for="">Disponibilidad</label>
                    <div class="admin__movie-input">
                        <div class="select-container">
                            <!-- name="nombreGenero" -->
                            <select name="disponibilidad" class="movie-input movie-select" <?= ($action == "show") ? "disabled" : "" ?>>
                                <option value="disponible" <?= $pelicula['disponibilidad'] == "disponible" ? "selected" : "" ?>>Disponible</option>
                                <option value="no disponible" <?= $pelicula['disponibilidad'] == "no disponible" ? "selected" : "" ?>>No disponible</option>
                            </select>
                            <i class="arrow-down"></i>
                        </div>
                    </div>
                    <label for="">Año</label>
                    <div class="admin__movie-input">
                        <input class="movie-input" type="number" step="any" name="anio" value="<?php echo $pelicula['anioPelicula'] ?>" <?= ($action == "show") ? "readonly" : "" ?>>
                    </div>
                    <label for="">Precio de venta $USD</label>
                    <div class="admin__movie-input">
                        <input class="movie-input" type="number" step="any" name="precioVenta" value="<?php echo $pelicula['precioVenta'] ?>" <?= ($action == "show") ? "readonly" : "" ?>>
                    </div>
                    <label for="">Precio del alquiler $USD</label>
                    <div class="admin__movie-input">
                        <input class="movie-input" type="number" step="any" name="precioAlquiler" value="<?php echo $pelicula['precioAlquiler'] ?>" <?= ($action == "show") ? "readonly" : "" ?>>
                    </div>
                    <label for="">Stock</label>
                    <div class="admin__movie-input">
                        <input class="movie-input" type="number" name="stock" value="<?php echo $pelicula['stock'] ?>" <?= ($action == "show") ? "readonly" : "" ?>>
                    </div>
                    <label for="">Descripción</label>
                    <div class="admin__movie-input">
                        <textarea class="movie-input" type="text" rows="5" name="descripcionPelicula" <?= ($action == "show") ? "readonly" : "" ?>>
                            <?php echo $pelicula['descripcionPelicula'] ?>"
                            </textarea>
                    </div>
                </div>
            </div>

        <?php } else {
            /* si no se han mandado datos mostramos el formulario sin datos */
            include_once 'views/admin/peliculadata.php';
        } ?>

        <!-- mostramos los botones de accion  -->
        <?php if (isset($action) && $action == "show") { ?>
            <!-- <div class="admin__btn-container">
                <a href="<?= BASE_DIR ?>Admin/dashboard/">
                    <button class="admin__btn admin__btn-cancel">Cancelar</button>
                </a>

            </div> -->
        <?php } else { ?>
            <div class="admin__btn-container">
                <!-- Si la accion es modificar se muestra -->
                <?php if (isset($action) && $action == "update") { ?>
                    <!-- <form action="<?= BASE_DIR ?>Pelicula/update/" method="POST"> -->
                        <input type="text" name="idPelicula" value="<?= $pelicula['idPelicula'] ?>" hidden>
                        <input type="text" name="editar" value="editar" hidden>
                        <button class="admin__btn admin__btn-save" type="submit">
                            <i class="far fa-save"></i> Guardar cambios
                        </button>
                    <!-- </form> -->
                    <!-- de lo contrario -->
                <?php } else { ?>
                    <!-- <form action="<?= BASE_DIR ?>Pelicula/insert/" method="POST"> -->
                        <button class="admin__btn admin__btn-save" type="submit">
                            <i class="far fa-save"></i> Guardar
                        </button>
                    <!-- </form> -->
                <?php } ?>

                <form action="<?= BASE_DIR ?>Pelicula/delete/" method="POST" class="<?= (!isset($pelicula) ? "disable" : "") ?> end">
                    <input type="text" name="idPelicula" value="<?= $pelicula['idPelicula'] ?>" hidden>
                    <button class="admin__btn admin__btn-delete" type="submit">
                        <i class="fas fa-trash-alt"></i> Eliminar
                    </button>
                </form>
            </div>
        <?php } ?>


    </form>