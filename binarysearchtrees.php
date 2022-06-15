<?php
require_once __DIR__."/vendor/autoload.php";

use B2\BinarySearchTrees\Node;

// De class Node is niet opgenomen in dit antwoord.

echo "Welkom bij de sorteerder.\n";
echo "Hoeveel getallen wil je invoeren? ";
$aantal = trim(fgets(STDIN));

echo "Geef een getal: ";
$value = trim(fgets(STDIN));
$tree = new Node($value);

for ($i = 0; $i < $aantal - 1; $i++) {
    echo "Geef een getal: ";
    $getal = trim(fgets(STDIN));
    $tree->add($getal);
}

echo "Klaar met invoeren, sorteren gaat beginnen!\n";
echo "...\n";
$tree->print();