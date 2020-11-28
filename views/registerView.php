<?php require_once 'render/BaseLayout.php'; ?>

<?php BaseLayout::renderHead(); ?>
<?php BaseLayout::renderHeader(); ?>


<main class="login__main">
    <div class="login__bg-img"></div>
    <div class="login__container">

        <div class="login__logo">
            <div class="login__logo-page">
                <img class="login__logo-img" src="<?= BASE_DIR ?>assets/images/logo-pelicula-pagina.png" alt="logo de infinity cinema">
                <h1 class="login__logo-text">Infinity Cinema</h1>
            </div>
            <p class="login__description">
                Todas las peliculas en una sola plataforma, alquila o compra la pelicula
                que tanto quieres ver! Desde peliculas en estreno hasta las peliculas mas antiguas.
                Todo en un solo lugar, Infinity Cinema.                
            </p>
        </div>
        <div class="login__form">
            <h1 class="login__form-title">Registrarme</h1>
            <form action="<?= BASE_DIR;?>Usuario/registrarUsuario/" class="form" method="POST">
                <label for="correoLogin" class="login__label">Correo</label>
                <input type="email" class="form__input-text" name="correoRegistro" id="correoLogin" placeholder="Ingrese un correo electronico"  
                 required>
                
                <label for="contrasenaLogin" class="login__label">Contraseña</label>
                <input type="password" class="form__input-text" name="contrasenaRegistro" id="contrasenaLogin" placeholder="Ingrese una contraseña" required>
                
                <label for="contrasenaLogin" class="login__label">Confirmar contraseña</label>
                <input type="password" class="form__input-text" name="" id="contrasenaLogin2" placeholder="Ingrese nuevamente la contraseña"required>
                
                <input type="submit" class="form__input-btn" name="" id="" value="Registrarme">
            </form>
            <a href="<?= BASE_DIR;?>App/login/" class="form__link">¿Ya tienes una cuenta? Iniciar sesión</a>
        </div>
    </div>

</main>


<?php BaseLayout::renderFooter(); ?>