<!-- seleccionamos una pelicula ramdon de la BD -->
<?php
$numeroRamdon = rand(0, count($listaPeliculas) - 1);
?>

<!-- mostramos la pelicula-->
<section class="slide">
    <div class="slide__background-img"></div>


    <div class="slide__movie-container">

        <!-- <img class="slide__poster-movie" src="<?= BASE_DIR; ?>assets/images/slide/alice-pelicula-poster.jpg" alt="poster pelicula"> -->
        <img class="slide__poster-movie" src="data:image/jpg;base64,<?= base64_encode($listaPeliculas[$numeroRamdon]["posterPelicula"]); ?>" alt="poster pelicula">

        <div class="slide__info-movie">
            <h1 class="slide__title-movie"><?= $listaPeliculas[$numeroRamdon]["tituloPelicula"] ?></h1>
            <p class="slide__anio-movie"><?= $listaPeliculas[$numeroRamdon]["anioPelicula"] ?></p>
            <p class="slide__gender-movie"><?= $listaPeliculas[$numeroRamdon]["nombreGenero"] ?></p>

            <div class="slide__like-container">
                <img src="<?= BASE_DIR; ?>assets/images/slide/heart.svg" class="slide__heart" alt="icono corazon">
                <p class="slide__likes"><?= $listaPeliculas[$numeroRamdon]["cantidadMeGusta"] ?></p>
            </div>

            <p class="slide__description-movie">
                <?= $listaPeliculas[$numeroRamdon]["descripcionPelicula"] ?>
            </p>
            <form action="<?= BASE_DIR;?>App/pelicula/" method="POST">
                <div class="slide__buttons-container">
                    <input type="text" name="idPelicula" value="<?= $listaPeliculas[$numeroRamdon]["idPelicula"]?>" id="" hidden>
                    <input class="slide__btn" type="submit" value="Ver pélicula"> 
                    <!-- <button class="slide__btn">Ver pélicula</button> -->
                    <button type="submit" class="slide__btn slide__btn--outline">Añadir +</button>
                </div>
            </form>

        </div>
    </div>
</section>

<div class="transition"></div>