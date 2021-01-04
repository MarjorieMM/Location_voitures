<?php

function seeArray($tab)
{
    echo '<pre>';

    print_r($tab);

    echo '</pre>';
}

require_once 'Manager.php';
require_once 'CarDriverAssoc.php';

class CarDriverAssocManager extends Manager
{
    public $assocs;

    public function addAssoc($assoc)
    {
        $this->assocs[] = $assoc;
    }

    public function getAssocs()
    {
        return $this->assocs;
    }

    public function loadAssocs()
    {
        $req = $this->getBdd()->prepare("SELECT association_vehicule_conducteur.id_association, association_vehicule_conducteur.id_conducteur, CONCAT_WS(' ', conducteur.prenom, conducteur.nom), CONCAT_WS(' ', vehicule.marque, vehicule.modele), vehicule.id_vehicule FROM association_vehicule_conducteur LEFT JOIN conducteur ON association_vehicule_conducteur.id_conducteur = conducteur.id_conducteur LEFT JOIN vehicule ON vehicule.id_vehicule = association_vehicule_conducteur.id_vehicule");
        $req->execute();
        $myAssocs = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($myAssocs as $assoc) {
            $asso = new CarDriverAssoc($assoc['id_association'], $assoc['id_conducteur'], $assoc["CONCAT_WS(' ', conducteur.prenom, conducteur.nom)"], $assoc["CONCAT_WS(' ', vehicule.marque, vehicule.modele)"], $assoc['id_vehicule']);
            $this->addAssoc($asso);
        }
    }

    public function newAssocDB($id_conducteur, $id_vehicule)
    {
        $query = 'INSERT INTO association_vehicule_conducteur VALUES(NULL, :id_conducteur, :id_Vehicule)';
        $statement = $this->getBdd()->prepare($query);
        $statement->bindValue(':id_conducteur', $id_conducteur, PDO::PARAM_INT);
        $statement->bindValue(':id_Vehicule', $id_vehicule, PDO::PARAM_INT);
        $result = $statement->execute();
        $statement->closeCursor();
        if ($result) {
            $assoc = new Assoc($this->getBdd()->lastInsertId(), $id_conducteur, $id_vehicule);
            $this->addAssoc($assoc);
        }
    }
}
