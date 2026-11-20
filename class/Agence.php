<?php

require_once "./Vehicule.php";
require_once "./Entretenable.php";
require_once "./Client.php";
require_once "./Location.php";

class Agence
{
    private array $vehicules = [];
    private array $locations = [];

    public function __construct (private string $nom) {}

    private function trouverVehicule (string $immatriculation): ?Vehicule 
    {
        foreach ($this-> vehicules as $vehicule){
            if ($vehicule-> getImmatriculation() === $immatriculation){
                return $vehicule;
            }
        }
        return null;
    }

    public function getVehiculeDisponibles():array
    {
        return array_vallues(
            array_filter($this->vehicules, fn(Vehicule $v)=> $v->estDisponible())
        );
    }
    
    public function louerVehicule(Client $client, string $immatriculation, int $jours): ?Location
    {
        $vehicule = $this->trouverVehicule($immatriculation);

        if ($vehicule === null || !$vehicule->estDisponible()) {
            return null;
        }
        if ($vehicule instanceof Entretenable && $vehicule->necessiteEntretien()) {
            return null;
        }

        $montantTTC = $vehicule->louer($jours);
        $location = new Location($client, $vehicule, $jours, $montantTTC);
        $this->locations[] = $location;

        return $location;
    }

    public function rendreVehicule(string $immatriculation, int $kmParcourus = 0): void
    {
        $vehicule = $this->trouverVehicule($immatriculation);
        if ($vehicule === null) {
            return;
        }

        $vehicule->rendre();

        if ($vehicule instanceof Entretenable) {
            $vehicule->ajouterKilometres($kmParcourus);
        }
    }

        public function getChiffreAffaires(): float
    {
        $total = 0.0;
        foreach ($this->locations as $location) {
            $total += $location->getMontantTTC();
        }
        return $total;
    }

    public function __serialize(): array
    {
        return [
            'nom' => $this->nom,
            'vehicules' => $this->vehicules,
            'locations' => $this->locations,
        ];
    }

    public function __unserialize(array $data): void
    {
        $this->nom = $data['nom'];
        $this->vehicules = $data['vehicules'];
        $this->locations = $data['locations'];
    }

    public function sauvegarder(string $fichier): void
    {
        file_put_contents($fichier, serialize($this));
    }

    public static function charger(string $fichier): Agence
    {
        return unserialize(file_get_contents($fichier));
    }
}