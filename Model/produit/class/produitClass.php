<?php

namespace Model\ClassModel;

Class Produit
{
    protected $id;
    protected $nom;
    protected $composant;
    protected $prix;
    protected $id_entreprise_relation;

    public function __construct($id,$nom,$composant,$prix,$id_entreprise_relation)
    {
        $this->setId($id);
        $this->setNom($nom);
        $this->setComposant($composant);
        $this->setPrix($prix);
        $this->setIdRelations($id_entreprise_relation);
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
            return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
            $this->id = $id;

            return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
            return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
            $this->nom = $nom;

            return $this;
    }

    /**
     * Get the value of composant
     */ 
    public function getComposant()
    {
            return $this->composant;
    }

    /**
     * Set the value of composant
     *
     * @return  self
     */ 
    public function setComposant($composant)
    {
            $this->composant = $composant;

            return $this;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix()
    {
            return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix($prix)
    {
            $this->prix = $prix;

            return $this;
    }

    /**
     * Get the value of id_entreprise_relation
     */ 
    public function getIdRelations()
    {
            return $this->id_entreprise_relation;
    }

    /**
     * Set the value of id_entreprise_relation
     *
     * @return  self
     */ 
    public function setIdRelations($id_entreprise_relation)
    {
            $this->id_entreprise_relation = $id_entreprise_relation;

            return $this;
    }
}  