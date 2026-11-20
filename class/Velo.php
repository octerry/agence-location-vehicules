<?php

require_once "./Vehicule.php";

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
        parent :: ___construct($immatriculation, $marque, $modele, $tarifJournalier, $disponible);
    }

    public function calculerPrixHT(int $jours): float
    {
        $prix = $jour * $this->tarifJournalier;

        if($jour >=7){
            $prix = $prix*0.8;
        }

        return $prix;
    }

}