<?php
require_once __DIR__."/vendor/autoload.php";

use B2\Contactenlijst\Contact;
use B2\Contactenlijst\Contactenlijst;

$alex = new Contact();
$alex->voornaam = "Alex";
$alex->achternaam = "Verhoeven";
$alex->telefoon = "0698765431";
$alex->email = "alex.verhoeven@voorbeeld.nl";
$alex->geboortejaar = 2001;
$alex->geboortemaand = 5;
$alex->geboortedag = 27;

$amber = new Contact();
$amber->voornaam = "Amber";
$amber->achternaam = "van Hoorn";
$amber->telefoon = "0612345678";
$amber->email = "ambervanhoorn@voorbeeld.nl";
$amber->geboortejaar = 2003;
$amber->geboortemaand = 1;
$amber->geboortedag = 3;

$diego = new Contact();
$diego->voornaam = "Diego";
$diego->achternaam = "Coenraad";
$diego->telefoon = "0619283746";
$diego->email = "dcoenraad@voorbeeld.nl";
$diego->geboortejaar = 1998;
$diego->geboortemaand = 7;
$diego->geboortedag = 15;

$lijst = new Contactenlijst();

$lijst->voegToe($alex);
$lijst->voegToe($amber);
$lijst->voegToe($diego);

$lijst->print();
