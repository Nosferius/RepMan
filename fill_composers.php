<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$config = parse_ini_file(realpath('config.ini'));
require_once('lib/Model/composers.php');
require_once('lib/Model/musicalForms.php');

$data = [
"Albeniz",
"Bach",
"Bartok",
"Beethoven",
"Busoni",
"Brahms",
"Chopin",
"Debussy",
"Franck",
"Haydn",
"Joplin",
"Mendelssohn",
"Mozart",
"Mussorgsky",
"Paderewski",
"Prokofiev",
"Rachmaninoff",
"Ravel",
"Rimski-Korsakov",
"Rubinstein",
"Saint-Saëns",
"Satie",
"Scarlatti",
"Schubert",
"Schumann",
"Scriabin",
"Shostakovich",
"Sibelius",
"Tchaikovsky",
"Liszt"
];
foreach($data as $ComposerLastname)
{
    $form= new composers;
    $form->setComposerLastname($ComposerLastname);
    $form->add();
    echo "Added: ".$ComposerLastname."<br>";
}
?>