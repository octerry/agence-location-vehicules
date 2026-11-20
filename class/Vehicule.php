<?php

require_once "../Trait/HistoriqueTrait.php";

abstract class Vehicule  {
    use HistoriqueTrait;

    private const float TVA = 1.20;
    protected int $nbVehicules;

    private string $immatriculation;
    private string $marque;
    private string $modele;
    protected float $tarifJournalier;
    private bool $disponible;

    function __construct(
        string $immatriculation,
        string $marque,
        string $modele,
        float $tarifJournalier,
        bool $disponible = true
    ) {
        $this->immatriculation = $immatriculation;
        $this->marque = $marque;
        $this->modele = $modele;
        $this->tarifJournalier = $tarifJournalier;
        $this->disponible = $disponible;
    }
    function __tostring(): string {
        return 
            '<h1>' . $this->modele . '</h1><br>'
            . '<h2>' . $this->marque . '</h2><br>'
            . '<p>Immatricule : ' . $this->immatriculation . '</p><br>'
            . '<p>' . ($this->tarifJournalier * self::TVA) . '€ / jour</p><br>'
            . '<p>' . ($this->disponible ? "disponible" : "indisponible") . '</p>';
    }

    // ABSTRACT
    abstract public function calculerPrixHT(int $jours): float;

    // GET
    public function getNbVehicules():int {
        return self::$nbVehicules;
    }
    public function estDisponible():bool {
        return $this->disponible;
    }

    // SET
    public function setImmatriculation(string $immatriculation):self {
        // pattern -->  start-middle-end
        if (preg_match('/(?P<start>\w+)-(?P<middle>\w+)-(?P<end>\d+)/', $immatriculation)) {
            $this->immatriculation = $immatriculation;
        }
        return $this;
    }
    public function setTarifJournalier(float $tarif):self {
        if ($tarif > 0) {
            $this->tarifJournalier = $tarif;
        }
        return $this;
    }
    final public function louer(int $jours): float {
        if ($this->disponible || $jours > 0) {
            return $jours * $this->tarifJournalier * self::TVA;
        }
        else {
            return 0;
        }
    }
    public function rendre(): void {
        $this->disponible = true;
        $this->ajouterHistorique("voiture rendue");
    }
}