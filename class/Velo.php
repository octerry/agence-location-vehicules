<?php

require_once __DIR__ . "/Vehicule.php";

final class VeloElectrique extends Vehicule
{
    public function __construct(
        string $immatricultation,
        string $marque,
        string $modele,
        float $tarifParJour,
        private int $autonomie,
        bool $disponibilte = true
    ){
        parent::__construct($immatricultation, $marque, $modele, $tarifParJour, $disponibilte);
    }

    public function calculerPrixHT(int $jour): float
    {
        $prix = $jour * $this->tarifJournalier;

        if($jour >=7){
            $prix = $prix*0.8;
        }

        return $prix;
    }

}