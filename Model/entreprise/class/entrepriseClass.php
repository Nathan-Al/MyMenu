<?php

namespace Model\ClassModel;

class Entreprise
{
    protected $id;
    protected $nom;
    protected $horaire;
    protected $localisation;
    protected $gpsX;
    protected $gpsY;
    protected $siren;

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
}
?>