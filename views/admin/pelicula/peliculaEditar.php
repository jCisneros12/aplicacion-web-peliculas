<form action="<?= BASE_DIR; ?>Pelicula/update/" method="POST" enctype="multipart/form-data">
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

            <!-- id de la pelucula -->
            <input type="text" name="idPelicula" value="<?= $pelicula['idPelicula'] ?>" hidden>
            <!-- ----------------- -->

            <div class="admin__movie-data">
                <label for="">Título</label>
                <div class="admin__movie-input">
                    <input class="movie-input" type="text" name="tituloPelicula" id="" value="<?php echo $pelicula['tituloPelicula']; ?>" <?= ($action == "show") ? "readonly" : "" ?>>
                </div>
                <label for="">Genero</label>
                <div class="admin__movie-input">
                    <div class="select-container">
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

    <?php } ?>

    <!-- mostramos los botones de accion  -->
    <?php if (isset($action) && $action != "show") { ?>
        <div class="admin__btn-container">

            <button class="admin__btn admin__btn-save" type="submit">
                <i class="far fa-save"></i> Guardar
            </button>

            <form action="<?= BASE_DIR ?>Pelicula/delete/" method="POST" class="<?= (!isset($pelicula) ? "disable" : "") ?> end">
                <input type="text" name="idPelicula" value="<?= $pelicula['idPelicula'] ?>" hidden>
                <button class="admin__btn admin__btn-delete" type="submit">
                    <i class="fas fa-trash-alt"></i> Eliminar
                </button>
            </form>
        </div>
    <?php }  ?>

</form>