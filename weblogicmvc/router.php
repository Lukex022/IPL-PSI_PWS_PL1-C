<?php
require_once './startup/boot.php';
require_once './controllers/SiteController.php';
require_once './controllers/AuthController.php';
require_once './controllers/EmpresaController.php';

if(!isset($_GET['c'], $_GET['a']))
{
    // omissão, enviar para site
    $controller = new SiteController();
    $controller->index();
}
else
{
    // existem parametros definidos
    $c = $_GET['c'];
    $a = $_GET['a'];

    switch ($c)
    {
        case "login":
            $controller = new AuthController();
            switch ($a)
            {
                case "index":
                    $controller->index();
                    break;

                case "login":

                    $controller->login();
                    break;

                case "logout":
                    $controller->logout();
            }
            break;

        case "site":
            $controller = new SiteController();
            switch ($a) {
                case "index":
                    $controller->index();
                    break;
            }
            break;

        case "empresa":
            $controller = new EmpresaController();
            switch ($a) {
                case "index":
                    $controller->index();
                    break;
            }
            break;

        default:
            $controller = new SiteController();
            $controller->index();
    }

}