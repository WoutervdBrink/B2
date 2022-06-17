<?php

namespace B2\BinarySearchTrees;

class Node
{
    public $left;
    public $right;
    public $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function add(int $value)
    {
        // De gewenste waarde is kleiner dan of gelijk aan de waarde van deze knoop. Voeg hem links toe.
        if ($value <= $this->value) {
            // Deze knoop heeft geen linkerkind. Dan wordt de nieuwe knoop het linkerkind.
            if (empty($this->left)) {
                $this->left = new Node($value);
            }
            // Deze knoop heeft al een linkerkind. Voeg de nieuwe knoop toe aan dit kind.
            else {
                $this->left->add($value);
            }
        }
        // De gewenste waarde is groter dan de waarde van deze knoop. Voeg hem rechts toe.
        else {
            // Deze knoop heeft geen rechterkind. Dan wordt de nieuwe knoop het rechterkind.
            if (empty($this->right)) {
                $this->right = new Node($value);
            }
            // Deze knoop heeft al een rechterkind. Voeg de nieuwe knoop toe aan dit kind.
            else {
                $this->right->add($value);
            }
        }
    }

    public function has(int $value)
    {
        // De gezochte waarde is gelijk aan de waarde van deze knoop. Dus deze tree bevat deze waarde.
        if ($value == $this->value) {
            return true;
        }

        // De gezochte waarde is kleiner dan de waarde van deze knoop. Zoek links verder.
        else if ($value < $this->value) {
            // Er is links niks meer. Deze tree bevat niet deze waarde.
            if (empty($this->left)) {
                return false;
            }
            // Zoek links verder.
            return $this->left->has($value);
        }

        // De gezochte waarde is groter dan de waarde van deze knoop. Zoek rechts verder.
        else {
            // Er is rechts niks meer. Deze tree bevat niet deze waarde.
            if (empty($this->right)) {
                return false;
            }
            // Zoek rechts verder.
            return $this->right->has($value);
        }
    }

    public function print()
    {
        if (!empty($this->left)) {
            $this->left->print();
        }
        echo $this->value."\n";
        if (!empty($this->right)) {
            $this->right->print();
        }
    }
}