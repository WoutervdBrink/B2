<?php

namespace B2\Contactenlijst;

class Contact
{
    public string $voornaam;
    public string $achternaam;
    public string $telefoon;
    public string $email;
    public int $geboortejaar;
    public int $geboortemaand;
    public int $geboortedag;

    public function geboortedatum()
    {
        return $this->geboortejaar . "-" . $this->geboortemaand . "-" . $this->geboortedag;
    }

    public function print()
    {
        echo "Voornaam: ".$this->voornaam."\n";
        echo "Achternaam: ".$this->achternaam."\n";
        echo "Telefoon: ".$this->telefoon."\n";
        echo "E-mailadres: ".$this->email."\n";
        echo "Geboortedatum: ".$this->geboortedatum()."\n";
    }
}