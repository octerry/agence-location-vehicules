<?php

interface Louable{
    public function louer(int $jour):float;
    public function rendre(): void;
    public function estDisponible(): bool; 
}