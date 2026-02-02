<?php

class CompteBancaire{
    private float $solde = 500;

    public function deposer(float $montant){
        if($montant > 0){
            if($this->solde < 0){
                $difference = $montant + $this->solde;
                return $this->solde = $difference;
            }else if($this->solde >= 0){
                return $this->solde += $montant;
            }
        }else{
            return "enter un montant plus de 0";
        }
    }

    public function retirer($montant){
        if($montant <= $this->solde){
            $solde = $this->solde -= $montant;
            return $solde;
        }else{
            return "cette montant est invalide";
        }
    }
}