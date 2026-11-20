<?php

interface Entretenable {
    public function ajouterKilometres(int $km):self;
    public function besoinEntretiens():bool;
    public function entretenir(): void;
}