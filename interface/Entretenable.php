<?php

interface Entretenable {
    public function ajouterKilometres(int $km);
    public function besoinEntretiens():bool;
    public function entretenir(): void;
}