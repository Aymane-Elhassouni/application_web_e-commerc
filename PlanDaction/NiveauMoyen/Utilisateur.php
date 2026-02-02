<?php

class Utilisateur{
    protected string $nom;
    protected string $email;
    protected static int $counter = 0;

    protected function __construct(){
        return self::$counter += 1;
    }
}