<?php

class CarDriverAssoc
{
    private $id_association;
    private $id_conducteur;
    private $conducteur;
    private $vehicule;
    private $id_vehicule;

    public function __construct($id_association, $id_conducteur, $conducteur, $vehicule, $id_vehicule)
    {
        $this->id_association = $id_association;
        $this->id_conducteur = $id_conducteur;
        $this->conducteur = $conducteur;
        $this->vehicule = $vehicule;
        $this->id_vehicule = $id_vehicule;
    }

    /**
     * Get the value of id_association.
     */
    public function getId_association()
    {
        return $this->id_association;
    }

    /**
     * Set the value of id_association.
     *
     * @return self
     */
    public function setId_association($id_association)
    {
        $this->id_association = $id_association;

        return $this;
    }

    /**
     * Get the value of id_conducteur.
     */
    public function getId_conducteur()
    {
        return $this->id_conducteur;
    }

    /**
     * Set the value of id_conducteur.
     *
     * @return self
     */
    public function setId_conducteur($id_conducteur)
    {
        $this->id_conducteur = $id_conducteur;

        return $this;
    }

    /**
     * Get the value of id_vehicule.
     */
    public function getId_vehicule()
    {
        return $this->id_vehicule;
    }

    /**
     * Set the value of id_vehicule.
     *
     * @return self
     */
    public function setId_vehicule($id_vehicule)
    {
        $this->id_vehicule = $id_vehicule;

        return $this;
    }

    /**
     * Get the value of conducteur.
     */
    public function getConducteur()
    {
        return $this->conducteur;
    }

    /**
     * Set the value of conducteur.
     *
     * @return self
     */
    public function setConducteur($conducteur)
    {
        $this->conducteur = $conducteur;

        return $this;
    }

    /**
     * Get the value of vehicule.
     */
    public function getVehicule()
    {
        return $this->vehicule;
    }

    /**
     * Set the value of vehicule.
     *
     * @return self
     */
    public function setVehicule($vehicule)
    {
        $this->vehicule = $vehicule;

        return $this;
    }
}

class Assoc
{
    private $id_association;
    private $id_conducteur;
    private $id_vehicule;

    public function __construct($id_association, $id_conducteur, $id_vehicule)
    {
        $this->id_association = $id_association;
        $this->id_conducteur = $id_conducteur;
        $this->id_vehicule = $id_vehicule;
    }

    /**
     * Get the value of id_association.
     */
    public function getId_association()
    {
        return $this->id_association;
    }

    /**
     * Set the value of id_association.
     *
     * @return self
     */
    public function setId_association($id_association)
    {
        $this->id_association = $id_association;

        return $this;
    }

    /**
     * Get the value of id_conducteur.
     */
    public function getId_conducteur()
    {
        return $this->id_conducteur;
    }

    /**
     * Set the value of id_conducteur.
     *
     * @return self
     */
    public function setId_conducteur($id_conducteur)
    {
        $this->id_conducteur = $id_conducteur;

        return $this;
    }

    /**
     * Get the value of id_vehicule.
     */
    public function getId_vehicule()
    {
        return $this->id_vehicule;
    }

    /**
     * Set the value of id_vehicule.
     *
     * @return self
     */
    public function setId_vehicule($id_vehicule)
    {
        $this->id_vehicule = $id_vehicule;

        return $this;
    }
}