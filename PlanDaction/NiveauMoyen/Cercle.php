<?php

class Cercle extends Forme{
    public function calculerAire(){
        return $this->rayon / $this->largeur;
    }
}