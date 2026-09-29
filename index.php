<?php
require_once "app/controllers/DashboardController.php";
$controller = new DashboardController();

if (isset($_GET['accion'])) {

    if ($_GET['accion'] == 'agregar') {
        $controller->agregar();
    } else {
        $controller->index();
    }

} else {
    $controller->index();
}
?>