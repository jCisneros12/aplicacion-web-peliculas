<?php
session_start();

if (!isset($_SESSION['sessionRol'])) {
    //setcookie("sessionCinema", true);
    $_SESSION["sessionRol"] = 3;
}

if (!isset($_SESSION['carrito'])) {
    $_SESSION["carrito"] = null;
}
