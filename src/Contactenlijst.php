<?php

namespace B2;

class Contactenlijst
{
    private array $lijsten;

    public function __construct()
    {
        $this->lijsten = array();

        foreach (range("A", "Z") as $letter) {
            $this->lijsten[$letter] = new Lijst();
        }
    }

    public function voegToe(Contact $contact)
    {
        // Bepaal welke lijst we moeten raadplegen.
        $letter = substr($contact->voornaam, 0, 1);
        $lijst = $this->lijsten[$letter];

        // Voeg het contact toe aan de lijst.
        $lijst->voegToe($contact);
    }

    public function print()
    {
        foreach (range("A", "Z") as $letter) {
            $lijst = $this->lijsten[$letter];
            if ($lijst->grootte > 0) {
                echo $letter."\n";
                foreach ($lijst->contacten() as $contact) {
                    $contact->print();
                    echo "----------------------------------------\n";
                }
            }
        }
    }
}