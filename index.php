<?php

require_once './class/Agence.php';
require_once './class/Voiture.php';
require_once './class/Utilitaire.php';
require_once './class/Velo.php';

$agence = new Agence('Agence de location de véhicules');

$voiture1 = new Voiture('AB-123-CD', 'Renaud', 'Twingo', 12.3, 5, 31);
$voiture2 = new Voiture('EF-456-GH', 'Ferrari', 'Kangoo', 34.5, 7, 12, false);

$utilitaire = new Utilitaire('IJ-789-KL', 'Volvo', 'Prius', 24.4, 4, 238);

$velo = new VeloElectrique('MN-012-OP', 'Rockrider', 'RG23', 313.3, 12);

echo '<p>4 véhicules créés</p>';

echo '<br>';
echo $voiture1;
echo '<br>';
echo $voiture2;
echo '<br>';
echo $utilitaire;
echo '<br>';
echo $velo;