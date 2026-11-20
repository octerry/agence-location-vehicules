<?php

require_once __DIR__ . '/./Vehicule.php';
require_once __DIR__ . '/../interface/Entretenable.php';

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
        bool $disponibilte = true,
    ){
        parent::__construct($immatricultation,$marque,$modele,$tarifParJour,$disponibilte);
    }

    public function calculerPrixHT(int $jour):float
    {
        $prix = $jour * $this->tarifJournalier;

        if ($this->nbPlaces>5){
            $prix += 10 * $jour;
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

    public function ajouterKilometres(int $km): self {
        $this->kmDepuisEntretien += $km;
        return $this;
    }
    public function besoinEntretiens(): bool {
        return $this->kmDepuisEntretien >= self::SEUIL_ENTRETIEN;
    }
}
