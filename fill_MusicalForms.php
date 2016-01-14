<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

$config = parse_ini_file(realpath('config.ini'));
require_once('lib/Model/composers.php');
require_once('lib/Model/musicalForms.php');

$data = [
    "Air",
    "Arabesque",
    "Bagatelle",
    "Ballade",
    "Barcarolle",
    "Berceuse",
    "Canon",
    "Cantata",
    "Caprice",
    "Concerto",
    "Etude",
    "Fantasia",
    "Fugue",
    "Impromptu",
    "March",
    "Mazurka",
    "Minuet",
    "Nocturne",
    "Partita",
    "Polonaise",
    "Prelude",
    "Rhapsody",
    "Rondo",
    "Scherzo",
    "Sonata",
    "Sonatina",
    "Suite",
    "Symphonic poem",
    "Tango",
    "Tocatta",
    "Variations",
    "Waltz"
];
foreach($data as $MusicalForm)
{
    $form= new MusicalForms;
    $form->setMusicalForm($MusicalForm);
    $form->add();
    echo "Added: ".$MusicalForm."<br>";
}