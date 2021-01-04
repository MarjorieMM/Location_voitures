<?php

require_once './modele/CarDriverAssocManager.php';

class CarDriverAssocController
{
    private $assocManager;

    public function __construct()
    {
        $this->assocManager = new CarDriverAssocManager();
        $this->assocManager->loadAssocs();
    }

    public function displayAssocs()
    {
        $assocs = $this->assocManager->getAssocs();
        require_once 'vue/assoc.view.php';
    }

    public function newAssocForm()
    {
        //affiche le formulaire d'ajout
        $assocs = $this->assocManager->getAssocs();
        require_once 'vue/new.assoc.view.php';
    }

    public function newAssocValidation()
    {
        $this->assocManager->newAssocDB($_POST['id_conducteur'], $_POST['id_vehicule']);
        seeArray($_POST);
        // header('Location: '.URL.'associations');
    }
}

    // public function editAssocForm($id)
    // {
    //     $assoc = $this->assocManager->getAssocById($id);
    //     require_once 'vue/edit.assoc.view.php';
    // }

    // public function editAssocValidation()
    // {
    //     $this->assocManager->editAssocDB($_POST['id_vehicule'], $_POST['marque'], $_POST['modele'], $_POST['couleur'], $_POST['immatriculation']);
    //     header('Location: '.URL.'vehicules');
    // }

    // public function deleteCar($id)
    // {
    //     $assoc = $this->assocManager->deleteAssocDB($id);
    //     header('Location: '.URL.'vehicules');
    // }