<?php

class Rectangle extends Forme{
    public function calculerAire(){
        return $this->largeur * $this->hauteur;
    }
}