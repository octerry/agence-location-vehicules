<?php

// require_once './Client.php';
// require_once './Vehicule.php';

class Location {
    private Client $client;
    private Vehicule $vehicule;
    private int $jours;
    private float $montantTTC;
    private string $dateDebut;

    public function __construct (
        Client $client,
        Vehicule $vehicule,
        int $jours,
        float $montantTTC,
        string $dateDebut = ''
    )
    {
        if ($dateDebut === '') $dateDebut = date('d-m-Y');

        $this->client = $client;
        $this->vehicule = $vehicule;
        $this->jours = $jours;
        $this->montantTTC = $montantTTC;
        $this->dateDebut = $dateDebut;
    }

    public function __tostring(): string {
        return $this->client->getNomComplet() . ' - ' . $this->vehicule . ' - ' . $this->jours . ' jours - ' . $this->montantTTC . '€';
    }

    public function getClient(): Client {
        return $this->client;
    }
    public function getVehicule(): Vehicule {
        return $this->vehicule;
    }
    public function getJours(): int {
        return $this->jours;
    }
    public function getMontantTTC(): float {
        return $this->montantTTC;
    }
    public function getDateDebut(): string {
        return $this->dateDebut;
    }
}