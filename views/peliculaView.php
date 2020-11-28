<?php require_once 'render/BaseLayout.php'; ?>
<?php BaseLayout::renderHead(); ?>
<?php BaseLayout::renderHeader(); ?>
<?php include_once 'helpers/fechaentrega.php'?>

<!-- mostramos la pelicula-->
<section class="slide">
    <div class="slide__background-img"></div>


    <div class="slide__movie-container">

        <!-- <img class="slide__poster-movie" src="<?= BASE_DIR; ?>assets/images/slide/alice-pelicula-poster.jpg" alt="poster pelicula"> -->
        <img class="slide__poster-movie" src="data:image/jpg;base64,<?= base64_encode($pelicula["posterPelicula"]); ?>" alt="poster pelicula">

        <div class="slide__info-movie">
            <h1 class="slide__title-movie"><?= $pelicula["tituloPelicula"] ?></h1>
            <p class="slide__anio-movie"><?= $pelicula["anioPelicula"] ?></p>
            <p class="slide__gender-movie"><?= $pelicula["nombreGenero"] ?></p>

            <div class="slide__like-container">
                <img src="<?= BASE_DIR; ?>assets/images/slide/heart.svg" class="slide__heart" alt="icono corazon">
                <p class="slide__likes"><?= $pelicula["cantidadMeGusta"] ?></p>
                <button class="slide__btn slide__btn--outline slide__btn-darlike">Me Gusta</button>
            </div>

            <p class="slide__description-movie">
                <?= $pelicula["descripcionPelicula"] ?>
            </p>
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

                <div class="slide__buttons-container">
                    <input class="slide__btn" type="submit" value="+ Comprar ($<?= $pelicula["precioVenta"] ?>)">
                </div>
            </form><br>
            <form action="<?= BASE_DIR; ?>App/carrito/" method="POST">

                <input type="text" value="<?= $pelicula["idPelicula"] ?>" name="idPelicula" hidden>
                <input type="text" value="<?= base64_encode($pelicula["posterPelicula"]) ?>" name="posterPelicula" hidden>
                <input type="text" value="<?= $pelicula["tituloPelicula"] ?>" name="tituloPelicula" hidden>
                <input type="text" value="Alquiler" name="adquisicion" hidden>
                <input type="text" value="<?= $fechaInicio ?>" name="fechaInicio" hidden>
                <input type="text" value="<?= $fechaEntrega ?>" name="fechaEntrega" hidden>
                <input type="text" value="1" name="cantidad" hidden>
                <input type="text" value="<?= $pelicula["precioAlquiler"] ?>" name="precioVenta" hidden>

                <div class="slide__buttons-container">
                <input class="slide__btn slide__btn--outline" type="submit" value="+ Alquilar ($<?= $pelicula["precioAlquiler"] ?>/semana)">
                </div>
            </form>
        </div>
    </div>
</section>

<div class="transition"></div>

<?php BaseLayout::renderFooter(); ?>