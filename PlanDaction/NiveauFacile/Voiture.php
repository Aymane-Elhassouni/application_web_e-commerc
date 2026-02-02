<?php

class Voiture{
    private string $marque = "BMW";
    private string $couleur = "blanc";
    private int $vitesse = 0;

    public function accelerer(){
        $this->vitesse +=10;
        return $this->vitesse;
    }

    public function afficherInfos(){
        return "marque : ". $this->marque."\n".
        "couleur : ". $this->couleur."\n".
        "vitesse : ". $this->vitesse;
    }
}