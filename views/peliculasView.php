
<?php
require_once 'database/DatabaseMysql.php';
require_once 'controllers/PeliculaController.php';
/* obtenemos los filtros si se esque se enviaron */
include_once 'helpers/moviefilter.php';
?>


<?php require_once 'render/BaseLayout.php'; ?>
<?php include_once 'helpers/fechaentrega.php'?>


<?php BaseLayout::renderHead(); ?>
<?php BaseLayout::renderHeader(); ?>


<main class="margin">
    <?php include_once 'views/peliculas/peliculasView.php' ?>
</main>


<?php BaseLayout::renderFooter(); ?>