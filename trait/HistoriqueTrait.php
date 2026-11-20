<?php
 
trait HistoriqueTrait {

    private array $historique = [];

    public function ajouterHistorique(string $message): void
    {
        $this-> historique[] = '[' .date('d/m/y H:i').']'. __CLASS__. ':'.$message;
    }

    public function afficherHistorique(): string
    {
        $html = '<ul>';
        foreach ($this->historique as $ligne) {
            $html .= '<li>' . $ligne . '</li>';
        }
        $html .= '</ul>';

        return $html;
    }
}

