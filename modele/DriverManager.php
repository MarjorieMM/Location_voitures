<?php

require_once 'Manager.php';
require_once 'Driver.php';

class DriverManager extends Manager
{
    public $drivers;

    public function addDriver($driver)
    {
        $this->drivers[] = $driver;
    }

    public function getDrivers()
    {
        return $this->drivers;
    }

    public function loadDrivers()
    {
        $req = $this->getBdd()->prepare('SELECT * FROM conducteur');
        $req->execute();
        $myDrivers = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($myDrivers as $driver) {
            $driv = new Driver($driver['id_conducteur'], $driver['prenom'], $driver['nom']);
            $this->addDriver($driv);
        }
    }

    public function newDriverDB($prenom, $nom)
    {
        $query = 'INSERT INTO conducteur VALUES(NULL, :prenom, :nom)';
        $statement = $this->getBdd()->prepare($query);
        $statement->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $statement->bindValue(':nom', $nom, PDO::PARAM_STR);
        $result = $statement->execute();
        $statement->closeCursor();

        if ($result) {
            $driver = new Driver($this->getBdd()->lastInsertId(), $prenom, $nom);
            $this->addDriver($driver);
        }
    }

    public function getDriverById($id)
    {
        foreach ($this->drivers as $driver) {
            if ($driver->getId() == $id) {
                return $driver;
            }
        }
    }

    public function editDriverDB($id, $prenom, $nom)
    {
        $query = 'UPDATE conducteur SET prenom=:prenom, nom=:nom WHERE id_conducteur=:id';
        $statement = $this->getBdd()->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $statement->bindValue(':nom', $nom, PDO::PARAM_STR);
        $result = $statement->execute();
        $statement->closeCursor();

        if ($result) {
            $this->getDriverById($id)->setPrenom($prenom);
            $this->getDriverById($id)->setNom($nom);
        }
    }

    public function deleteDriverDB($id)
    {
        $query = 'DELETE FROM conducteur WHERE id_conducteur=:id';
        $statement = $this->getBdd()->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $statement->execute();
        $statement->closeCursor();

        if ($result) {
            $driver = $this->getDriverById($id);
            unset($driver);
        }
    }
}
