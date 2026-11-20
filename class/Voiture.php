<?php

class Voiture extends Vehicule implements Entretenable
{
    public const SEUIL_ENTRETIEN = 15000;

    public function __construct(
        string $immatricultation,
        string $marque,
        string $modele,
        float $tarifParJour,
        private int $nbPlaces,
        private int $kmDepuisEntretien = 0,
        bool $disponibilte,
    ){
        parrent:: __construct($immatricultation,$marque,$modele,$tarifParJour,$disponibilte,);
    }

    public function calculerPrixHT(int $jour):float
    {
        $prix = $jour * $this->$tarifParJour;

        if ($this->$nbPlaces>5){
            $prix +=10* $jours;
        }

        return $prix;
    }

    public function entretenir(): void
    {
        $this->kmDepuisEntretien = 0;
        $this->ajouterHistorique('Entretien fait!!');
    }

    public function necessiteEntretien(): bool
    {
        return $this->kmDepuisEntretien >= self::SEUIL_ENTRETIEN;
    }
}
