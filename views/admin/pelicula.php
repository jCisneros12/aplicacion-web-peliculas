<?php require_once 'render/BaseLayout.php'; ?>
<?php require_once 'render/HomeRender.php'; ?>
<?php include_once 'helpers/fechaentrega.php' ?>

<?php BaseLayout::renderHead(); ?>
<?php BaseLayout::renderHeaderAdmin(); ?>

<main class="admin__main admin__main-movie">

    <?php
    switch ($accionSeleccionada) {
        case 'insertar':
            require_once 'views/admin/pelicula/peliculaNueva.php';
            break;

        case 'actualizar':
            require_once 'views/admin/pelicula/peliculaEditar.php';
            break;

        default:
            break;
    }
    ?>

</main>
<script src="https://kit.fontawesome.com/79ccb07dd0.js" crossorigin="anonymous"></script>