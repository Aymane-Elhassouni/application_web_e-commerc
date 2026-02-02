<?php

include 'NiveauFacile\Voiture.php';
include 'NiveauFacile\CompteBancaire.php';
include 'NiveauFacile\Produit.php';
include 'NiveauMoyen\Animal.php';
include 'NiveauMoyen\Chat.php';
include 'NiveauMoyen\Chien.php';
include 'NiveauMoyen\Utilisateur.php';
include 'NiveauMoyen\Admin.php';

// $voiture = new Voiture();

// $voiture->accelerer();
// $voiture->accelerer();
// $voiture->accelerer();  

// echo $voiture->afficherInfos();

// $deposer = new CompteBancaire();

// echo "solde est : ". $deposer->deposer(500);
// echo "\n";
// $retirer = new CompteBancaire();

// echo $retirer->retirer(5000);

// $produit = new Produit("Galaxy S25 Ultra",1110);

// echo $produit;

// $chat = new Chat();
// echo $chat->faireDuBruit();
// echo "\n";
// $chien = new Chien();
// echo $chien->faireDuBruit();

$admin = new Admin();

echo $admin;
