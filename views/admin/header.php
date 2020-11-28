<header>
    <nav class="navbar navbar-admin" id="navbar">
        <a href="<?= BASE_DIR; ?>App/index/" class="navbar__a navbar__link">
            <div class="navbar__logo">
                <img class="navbar__logo-img" src="<?= BASE_DIR; ?>assets/images/logo-pelicula-pagina.png" alt="cine logo">
                <p>Infinity Cinema</p>
            </div>
        </a>
        <div class="navbar__links">
            <ul class="navbar_list">
                <a href="<?= BASE_DIR; ?>Admin/dashboard/" class="navbar__a">
                    <li class="navbar__link">
                        <p class="navbar__text">
                            Péliculas
                        </p>
                    </li>
                </a>

                <a href="<?= BASE_DIR; ?>Admin/movimientos/" class="navbar__a">
                    <li class="navbar__link">
                        <p class="navbar__text">
                            Movimientos
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

                <a href="<?= BASE_DIR; ?>Usuario/cerrarSesion/" class="navbar__a">
                    <li class="navbar__link navbar__link--action">
                        <i class="fas fa-power-off" style="margin: 0 .2em;"></i> 
                        Cerrar sesion
                        <!-- <p class="text-small"> (<?= $_SESSION["correo"] ?>)</p>  -->
                    </li>
                </a>
            </ul>
        </div>
    </nav>
</header>