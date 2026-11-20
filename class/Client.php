<?php

class Client {
    private string $nom; 
    private string $prenom; 
    private string $email; 
    private string | null $telephone;

    public function __construct (
        string $nom,
        string $prenom,
        string $email,
        string | null $telephone = NULL
    )
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->telephone = $telephone;
    }

    public function __tostring() {
        return self::getNomComplet() . ' (' . $this->email . ')';
    }

    public function getNomComplet(): string {
        return $this->prenom . ' ' . $this->nom;
    }

    public function setEmail(string $email):self {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->email = $email;
        } else {
            throw new InvalidArgumentException('Email entré invalide');
        }
        return $this;
    }
}