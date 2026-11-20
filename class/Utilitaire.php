<?php

require_once __DIR__ . "/Vehicule.php";

class Utilitaire extends Vehicule {
    const SEUIL_ENTRETIEN = 10_000;
    const FRAIS_NETTOYAGE = 50;

    var float $volume;
    var float $kmDepuisEntretien;

    public function __construct(string $immatriculation, string $marque, string $modele, float $tarifJournalier, float $volume, float $kmDepuisEntretien, bool $disponible = true) {
        parent::__construct($immatriculation, $marque, $modele, $tarifJournalier, $disponible);
        $this->volume = $volume;
        $this->kmDepuisEntretien = $kmDepuisEntretien;
    }

    public function __tostring(): string {
        return parent::__tostring() . '<br><p>volume : ' . $this->volume . '</p>';
    }

    public function calculerPrixHT(int $jours): float {
        return $this->tarifJournalier * $jours * self::FRAIS_NETTOYAGE;
    }
}