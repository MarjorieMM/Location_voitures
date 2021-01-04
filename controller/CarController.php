<?php

require_once './modele/CarManager.php';

class CarController
{
    private $carManager;
    public $error;

    public function __construct()
    {
        $this->carManager = new CarManager();
        $this->carManager->loadCars();
    }

    public function displayCars()
    {
        $cars = $this->carManager->getCars();
        require_once 'vue/car.view.php';
    }

    public function newCarForm()
    {
        //affiche le formulaire d'ajout
        require_once 'vue/new.car.view.php';
    }

    public function newCarValidation()
    {
        $marque = isset($_POST['marque']) ? $_POST['marque'] : '';
        $modele = isset($_POST['modele']) ? $_POST['modele'] : '';
        $couleur = isset($_POST['couleur']) ? $_POST['couleur'] : '';
        $immatriculation = isset($_POST['immatriculation']) ? $_POST['immatriculation'] : '';

        if ($marque != '' && $modele != '' && $couleur != '' && $immatriculation != '') {
            $this->carManager->newCarDB($_POST['marque'], $_POST['modele'], $_POST['couleur'], $_POST['immatriculation']);
            header('Location: '.URL.'vehicules');
        } else {
            $this->error = '<p>Veuillez entrer un nom et un prénom</p>';
        }
    }

    public function editCarForm($id)
    {
        $car = $this->carManager->getCarById($id);
        require_once 'vue/edit.car.view.php';
    }

    public function editCarValidation()
    {
        $this->carManager->editCarDB($_POST['id_vehicule'], $_POST['marque'], $_POST['modele'], $_POST['couleur'], $_POST['immatriculation']);
        header('Location: '.URL.'vehicules');
    }

    public function deleteCar($id)
    {
        $car = $this->carManager->deleteCarDB($id);
        header('Location: '.URL.'vehicules');
    }
}
