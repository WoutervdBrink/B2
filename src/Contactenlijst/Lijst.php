<?php

namespace B2\Contactenlijst;

class Lijst
{
    public int $grootte = 0;
    public Element $eerste;

    public function voegToe(Contact $contact)
    {
        // Maak een nieuw Element-record aan voor het nieuwe contact.
        $nieuwElement = new Element();
        $nieuwElement->contact = $contact;

        if ($this->grootte == 0) {
            // Optie 1: De lijst is nog leeg.
            $this->eerste = $nieuwElement;
        } else {
            if ($this->eerste->contact->voornaam >= $contact->voornaam) {
                // Optie 2: Ieder contact in de lijst komt later dan het nieuwe contact.
                $nieuwElement->volgende = $this->eerste;
                $this->eerste = $nieuwElement;
            } else {
                // Optie 3: Er zijn één of meer contacten vóór dit contact.
                $element = $this->eerste;
                while (!empty($element->volgende)) {
                    $element = $element->volgende;
                    if ($contact->voornaam > $element->contact->voornaam) {
                        break;
                    }
                }

                // Het volgende element van het gevonden element moet verplaatst worden naar het nieuwe element.
                $tmpElement = $element;
                $element->volgende = $nieuwElement;
                $nieuwElement->volgende = $tmpElement;
            }
        }

        // Werk de grootte van de lijst bij.
        $this->grootte += 1;
    }

    public function contacten()
    {
        $contacten = array();
        $element = $this->eerste;

        for ($i = 0; $i < $this->grootte; $i++) {
            $contacten[] = $element->contact;

            if (!empty($element->volgende)) {
                $element = $element->volgende;
            }
        }

        return $contacten;
    }
}