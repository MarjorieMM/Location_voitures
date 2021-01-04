<?php

require_once './modele/DriverManager.php';

class DriverController
{
    private $driverManager;
    public $error;

    public function __construct()
    {
        $this->driverManager = new DriverManager();
        $this->driverManager->loadDrivers();
    }

    public function displayDrivers()
    {
        $drivers = $this->driverManager->getDrivers();
        require_once 'vue/driver.view.php';
    }

    public function newDriverForm()
    {
        //affiche le formulaire d'ajout
        require_once 'vue/new.driver.view.php';
    }

    public function newDriverValidation()
    {
        $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
        $nom = isset($_POST['nom']) ? $_POST['nom'] : '';

        if ($prenom != '' && $nom != '') {
            $this->driverManager->newDriverDB($_POST['prenom'], $_POST['nom']);
            header('Location: '.URL.'conducteurs');
        } else {
            $this->error = '<p>Veuillez entrer un nom et un prénom</p>';
        }
    }

    public function editDriverForm($id)
    {
        $driver = $this->driverManager->getDriverById($id);
        require_once 'vue/edit.driver.view.php';
    }

    public function editDriverValidation()
    {
        $this->driverManager->editDriverDB($_POST['id_conducteur'], $_POST['prenom'], $_POST['nom']);
        header('Location: '.URL.'conducteurs');
    }

    public function deleteDriver($id)
    {
        $driver = $this->driverManager->deleteDriverDB($id);
        header('Location: '.URL.'conducteurs');
    }
}