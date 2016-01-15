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

/*
                    <option value="1"> Albeniz </option>
                    <option value="Bach"> Bach </option>
                    <option value="Bartok"> Bartok </option>
                    <option value="Beethoven"> Beethoven </option>
                    <option value="Busoni"> Busoni </option>
                    <option value="Brahms"> Brahms </option>
                    <option value="Chopin"> Chopin </option>
                    <option value="Debussy"> Debussy </option>
                    <option value="Franck"> Franck </option>
                    <option value="Haydn"> Haydn </option>
                    <option value="Joplin"> Joplin </option>
                    <option value="Mendelssohn"> Mendelssohn </option>
                    <option value="Mozart"> Mozart </option>
                    <option value="Mussorgsky"> Mussorgsky </option>
                    <option value="Paderewski"> Paderewski </option>
                    <option value="Prokofiev"> Prokofiev </option>
                    <option value="Rachmaninoff"> Rachmaninoff </option>
                    <option value="Ravel"> Ravel </option>
                    <option value="Rimski-Korsakov"> Rimski-Korsakov </option>
                    <option value="Rubinstein"> Rubinstein </option>
                    <option value="Saint-Saëns"> Saint-Saëns </option>
                    <option value="Satie"> Satie </option>
                    <option value="Scarlatti"> Scarlatti </option>
                    <option value="Schubert"> Schubert </option>
                    <option value="Schumann"> Schumann </option>
                    <option value="Scriabin"> Scriabin </option>
                    <option value="Shostakovich"> Shostakovich </option>
                    <option value="Sibelius"> Sibelius </option>
                    <option value="Tchaikovsky"> Tchaikovsky </option>
                    <option value="Liszt"> Liszt </option> -->

*/