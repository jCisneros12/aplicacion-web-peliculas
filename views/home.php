<?php require_once 'render/BaseLayout.php'; ?>
<?php require_once 'render/HomeRender.php'; ?>
<?php include_once 'helpers/fechaentrega.php'?>

<?php BaseLayout::renderHead(); ?>
<?php BaseLayout::renderHeader(); ?>

<main>
    <!-- slide peliculas recomendadas -->
    <?php //HomeRender::renderSlide();?>
    <?php include_once 'views/home/section-slide.php' ?>
    <!-- seccion de peliculas -->
    <?php include_once 'views/home/section-movies.php' ?>
    <?php //HomeRender::renderMovies();?>
</main>

<?php BaseLayout::renderFooter(); ?>