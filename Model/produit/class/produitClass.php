<?php

namespace Model\ClassModel;

use JsonSerializable;
Class Produit implements JsonSerializable
{
    protected $id;
    protected $name;
    protected $composant;
    protected $price;
    protected $id_entreprise_relation;

    public function __construct($id,$name,$composant,$price,$id_entreprise_relation)
    {
        $this->setId($id);
        $this->setNom($name);
        $this->setComposant($composant);
        $this->setPrice($price);
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
        return $this->id = $id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setNom($name)
    {
        return $this->name = $name;
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
        return $this->composant = $composant;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        return $this->price = $price;
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
        return $this->id_entreprise_relation = $id_entreprise_relation;
    }

    public function jsonToObject($json)
    {
        $this->setNom($json['name']);
        $this->setComposant($json['composant']);
        $this->setPrice($json['price']);
        $this->setIdRelations($json['relations']);
    }

    public function jsonSerialize()
    {
        return 
        [
            'id'   => $this->getId(),
            'name' => $this->getName(),
            'composant' => $this->getComposant(),
            'price' => $this->getPrice(),
            'relations' => $this->getIdRelations()
        ];
    }
}  