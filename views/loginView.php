<?php require_once 'render/BaseLayout.php'; ?>

<?php BaseLayout::renderHead(); ?>
<?php BaseLayout::renderHeader(); ?>

<? 
$datosOK="";
if(isset($_SESSION["createds"])){
    if($_SESSION["createds"]==201){
        $datosOK = "Se ha registrado correctamente";
    }
}
if(isset($_SESSION['sok']) && $_SESSION['sok']=="nok"){
    $datosOK = "Correo o contraseña incorrecta";
}
?>

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
            <h1 class="login__form-title">Inicio de sesion</h1>
            <p class="message__register"><?= $datosOK ?></p>
            <form action="<?= BASE_DIR; ?>Usuario/iniciarSesion/" class="form" method="POST">
                <label for="correoLogin" class="login__label">Correo</label>
                <input type="email" class="form__input-text" name="correoLogin" id="correoLogin" placeholder="Ingrese su correo electronico" value="<?= !empty($_SESSION["correoRegistrado"]) ?  $_SESSION["correoRegistrado"] : "" ?>" required>
                <label for="contrasenaLogin" class="login__label">Contraseña</label>
                <input type="password" class="form__input-text" name="contrasenaLogin" id="contrasenaLogin" placeholder="Ingrese su contraseña" required>
                <input type="submit" class="form__input-btn" id="" value="Iniciar sesion">
            </form>
            <a href="<?= BASE_DIR; ?>App/register/" class="form__link">¿No tiene una cuenta aún? Registrarme</a>
        </div>
    </div>

</main>


<?php BaseLayout::renderFooter(); ?>