<?php

require_once 'Manager.php';
require_once 'Car.php';

class CarManager extends Manager
{
    public $cars;

    public function addCar($car)
    {
        $this->cars[] = $car;
    }

    public function getCars()
    {
        return $this->cars;
    }

    public function loadCars()
    {
        $req = $this->getBdd()->prepare('SELECT * FROM vehicule');
        $req->execute();
        $myCars = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($myCars as $car) {
            $ca = new Car($car['id_vehicule'], $car['marque'], $car['modele'], $car['couleur'], $car['immatriculation']);
            $this->addCar($ca);
        }
    }

    public function newCarDB($marque, $modele, $couleur, $immatriculation)
    {
        $query = 'INSERT INTO vehicule VALUES(NULL, :marque, :modele, :couleur, :immatriculation)';
        $statement = $this->getBdd()->prepare($query);
        $statement->bindValue(':marque', $marque, PDO::PARAM_STR);
        $statement->bindValue(':modele', $modele, PDO::PARAM_STR);
        $statement->bindValue(':couleur', $couleur, PDO::PARAM_STR);
        $statement->bindValue(':immatriculation', $immatriculation, PDO::PARAM_STR);
        $result = $statement->execute();
        $statement->closeCursor();

        if ($result) {
            $car = new Car($this->getBdd()->lastInsertId(), $marque, $modele, $couleur, $immatriculation);
            $this->addCar($car);
        }
    }

    public function getCarById($id)
    {
        foreach ($this->cars as $car) {
            if ($car->getId() == $id) {
                return $car;
            }
        }
    }

    public function editCarDB($id, $marque, $modele, $couleur, $immatriculation)
    {
        $query = 'UPDATE vehicule SET marque=:marque, modele=:modele, couleur=:couleur, immatriculation=:immatriculation WHERE id_vehicule=:id';

        $statement = $this->getBdd()->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->bindValue(':marque', $marque, PDO::PARAM_STR);
        $statement->bindValue(':modele', $modele, PDO::PARAM_STR);
        $statement->bindValue(':couleur', $couleur, PDO::PARAM_STR);
        $statement->bindValue(':immatriculation', $immatriculation, PDO::PARAM_STR);
        $result = $statement->execute();
        $statement->closeCursor();

        if ($result) {
            $this->getCarById($id)->setMarque($marque);
            $this->getCarById($id)->setModele($modele);
            $this->getCarById($id)->setCouleur($couleur);
            $this->getCarById($id)->setImmatriculation($immatriculation);
        }
    }

    public function deleteCarDB($id)
    {
        $query = 'DELETE FROM vehicule WHERE id_vehicule=:id';
        $statement = $this->getBdd()->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $statement->execute();
        $statement->closeCursor();

        if ($result) {
            $car = $this->getCarById($id);
            unset($car);
        }
    }
}