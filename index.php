<?php

define('URL', str_replace('index.php', '', (isset($_SERVER['HTTPS']) ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']));

require_once 'controller/DriverController.php';
require_once 'controller/CarController.php';
require_once 'controller/CarDriverAssocController.php';
$driverController = new DriverController();
$carController = new CarController();
$assocController = new CarDriverAssocController();

if (empty($_GET['page'])) {
    require_once 'vue/home.view.php';
} else {
    $url = explode('/', filter_var($_GET['page']), FILTER_SANITIZE_URL);
    switch ($url[0]) {
        case 'accueil':  require_once 'vue/home.view.php';
        break;
        case 'vehicules':
            if (empty($url[1])) {
                $carController->displayCars();
            // affiche le formaulaire et ajoute un nouveau jeu
            } elseif ($url[1] === 'add') {
                $carController->newCarForm();
            } elseif ($url[1] === 'gvalid') {
                $carController->newCarValidation();
            } elseif ($url[1] === 'delete') {
                $carController->deleteCar($url[2]);
            } elseif ($url[1] === 'edit') {
                $carController->editCarForm($url[2]);
            } elseif ($url[1] === 'editvalid') {
                $carController->editCarValidation();
                //Supprime un conducteur
            }
            break;

        case 'conducteurs':
                // affiche les conducteurs dans un tableau
            if (empty($url[1])) {
                $driverController->displayDrivers();
            // affiche le formulaire et ajoute un nouveau conducteur
            } elseif ($url[1] === 'add') {
                $driverController->newDriverForm();
            } elseif ($url[1] === 'gvalid') {
                $driverController->newDriverValidation();
            // Affiche le formulaire d'édition et
            // édite un conducteur avec son id
            } elseif ($url[1] === 'edit') {
                $driverController->editDriverForm($url[2]);
            } elseif ($url[1] === 'editvalid') {
                $driverController->editDriverValidation();
            //Supprime un conducteur
            } elseif ($url[1] === 'delete') {
                $driverController->deleteDriver($url[2]);
            }
        break;
        case 'associations':
            // affiche les associations dans un tableau
        if (empty($url[1])) {
            $assocController->displayAssocs();
        // affiche le formulaire et ajoute une nouvelle association
        } elseif ($url[1] === 'add') {
            $assocController->newAssocForm();
        } elseif ($url[1] === 'gvalid') {
            $assocController->newAssocValidation();
        }
    break;
}
}