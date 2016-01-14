<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

echo "<pre>";

$config = parse_ini_file('config.ini');
require_once('lib/Model/composers.php');
require_once('lib/Model/songs.php');
require_once('lib/Model/musicalForms.php');



$song = new Songs;
$song->setTitle('blaat');
$song->setMusicalForm(1);
$song->setLength('10:00:00');
$song->setDifficulty(5);
$song->setWantToPlay(2);
$song->setConcertReady(2);

$song->add();

/*
// Quick and dirty demo how to use object array in a view
$songs = new Songs;
foreach($songs->fetch() as $song){
    echo "<table>";
    echo "<tr>";
    echo "<td>";
    echo $song->getId();
    echo "</td>";
    echo "<td>";

    echo $song->getTitle();

    echo "</td>";
    echo "</tr>";
    echo "</table>";

}

*/

/*
$Composer = new composers;
$Composer->setComposerFirstname("Test");
$Composer->setComposerLastname("Werkt");
$Composer->add();
$result = $Composer->fetch();
print_r($result);
*/

// print_r($Composer);

// $list = new composers;
// $list->fetch();