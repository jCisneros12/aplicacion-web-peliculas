<?php
class BaseLayout {

    public static function renderHeader()
    {
        require_once "views/page/header.php";
    }

    public static function renderHeaderAdmin()
    {
        require_once "views/admin/header.php";
    }

    public static function renderFooter()
    {
        require_once "views/page/footer.php";
    }

    public static function renderHead(){
        require_once 'views/page/head.php';
    }
}