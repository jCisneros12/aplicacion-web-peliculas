<header>
    <nav class="navbar" id="navbar">
        <div class="navbar__logo">
            <img class="navbar__logo-img" src="<?= BASE_DIR; ?>assets/images/logo-pelicula-pagina.png" alt="cine logo">
            <p>Infinity Cinema</p>
        </div>
        <div class="navbar__links">
            <ul class="navbar_list">
                <a href="<?= BASE_DIR; ?>App/index/" class="navbar__a">
                    <li class="navbar__link">
                        <p class="navbar__text">
                            Home
                        </p>
                    </li>
                </a>

                <a href="<?= MOVIES_DIR; ?>1" class="navbar__a">
                    <li class="navbar__link">
                        <p class="navbar__text">
                            Péliculas
                        </p>
                    </li>
                </a>

                <?php if ($_SESSION['sessionRol'] == 3) { ?>
                    <a href="<?= BASE_DIR; ?>App/login/" class="navbar__a">
                        <li class="navbar__link navbar__link--action">
                            <img class="navbar__link--icon" src="<?= BASE_DIR; ?>assets/images/login.svg" alt="icono iniciar sesion">
                            Iniciar sesion
                        </li>
                    </a>
                <?php } ?>

                <?php if ($_SESSION['sessionRol'] == 2) { ?>
                    <a href="<?= BASE_DIR; ?>Usuario/cerrarSesion/" class="navbar__a">
                        <li class="navbar__link navbar__link--action">
                            Cerrar sesion
                            <!-- <p class="text-small"> (<?= $_SESSION["correo"] ?>)</p>  -->
                        </li>
                    </a>
                <?php } ?>

                <!-- <li class="navbar__link navbar__link--action">
                    <img class="navbar__link--icon" src="<?= BASE_DIR; ?>assets/images/shopping-cart.svg" alt="icono iniciar sesion">
                    <span>0</span>
                </li> -->
                <?php if ($_SESSION['sessionRol'] == 1) { ?>
                    <a href="<?= BASE_DIR; ?>Admin/dashboard/" class="navbar__a">
                        <li class="navbar__link navbar__link--action">
                            <img class="navbar__link--icon" src="<?= BASE_DIR; ?>assets/images/admin.svg" alt="icono iniciar sesion">
                            Administrador
                        </li>
                    </a>
                <?php } ?>
            </ul>
        </div>
    </nav>
</header>