<form action="<?= BASE_DIR; ?>Pelicula/insert/" method="POST" enctype="multipart/form-data">

    <div class="admin__info-movie">
    
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
    </div>
    <!-- botones de accion -->
    <div class="admin__btn-container">
        <!-- <a href="<?= BASE_DIR ?>Admin/dashboard/">
            <button class="admin__btn admin__btn-cancel">Cancelar</button>
        </a> -->

        <button class="admin__btn admin__btn-save" type="submit">
            <i class="far fa-save"></i> Guardar
        </button>
    </div>
</form>