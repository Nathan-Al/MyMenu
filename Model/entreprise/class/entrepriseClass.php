<?php

namespace Model\ClassModel;

use JsonSerializable;

class Entreprise implements JsonSerializable
{
    private $id;
    private $nom;
    private $horaire;
    private $localisation;
    private $gpsX;
    private $gpsY;
    private $siren;

    public function __construct($id,$nom,$horaire,$localisation,$gpsX,$gpsY,$siren)
    {
        $this->setId($id);
        $this->setNom($nom);
        $this->setHoraire($horaire);
        $this->setLocalisation($localisation);
        $this->setGpsX($gpsX);
        $this->setGpsY($gpsY);
        $this->setSiren($siren);
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        return  $this->id =$id;
    }

    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        return $this->nom =$nom;
    }

    public function getHoraire(){
        return $this->horaire;
    }

    public function setHoraire($horaire){
        return $this->horaire =$horaire;
    }

    public function getLocalisation(){
        return $this->localisation;
    }

    public function setLocalisation($localisation){
        return $this->localisation = $localisation;
    }

    public function getGpsX(){
        return $this->gpsX;
    }

    public function setGpsX($gpsX){
        return $this->gpsX = $gpsX;
    }

    public function getGpsY(){
        return $this->gpsY;
    }

    public function setGpsY($gpsY){
        return $this->gpsY = $gpsY;
    }

    public function getSiren(){
        return $this->siren;
    }

    public function setSiren($siren){
        return $this->siren = $siren;
    }

    public function jsonSerialize()
    {
        return 
        [
            'id'   => $this->getId(),
            'name' => $this->getNom(),
            'horaire' => $this->getHoraire(),
            'localisation' => $this->getLocalisation(),
            'gpsX' => $this->getGpsX(),
            'gpsY' => $this->getGpsY(),
            'siren' => $this->getSiren()
        ];
    }
}
?>