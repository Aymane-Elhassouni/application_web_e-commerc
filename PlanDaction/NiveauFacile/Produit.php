<?php

class Produit{
    private string $nom;
    private float $prix;
    public function __construct(string $nom,float $prix){
        $this->nom = $nom;
        $this->prix = $prix;
    }
    public function __toString(){
        return "nom : ". $this->nom.
        "\n".
        "prix : ". $this->prix."$";
    }
}