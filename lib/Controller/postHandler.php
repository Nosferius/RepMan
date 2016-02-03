<?php

class postHandler
{

    /**
     * postHandler constructor.
     */
    public function __construct()
    {
    }

    // fixme: fetch values to be set through foreach loops through the respective db tables,
    // this cleans up below code a lot and prevents coding things double in future

    public function run()
    {
        if (!isset($_POST["action"])){
            return;
        }
        if ($_POST["action"] == "addComposer"){
            $composer = new composers();
            $composer->setComposerFirstname($_POST["ComposerFirstname"]);
            $composer->setComposerLastname($_POST["ComposerLastname"]);
            $composer->setDateOfBirth($_POST["DateOfBirth"]);
            $composer->setPlaceOfBirth($_POST["PlaceOfBirth"]);
            $composer->setBirthCountry($_POST["BirthCountry"]);
            $composer->setDeceased($_POST["Deceased"]);
            $composer->add();
        }
        elseif ($_POST["action"] == "updateComposer"){
            $composer = new composers();
            $composer->setComposerFirstname($_POST["ComposerFirstname"]);
            $composer->setComposerLastname($_POST["ComposerLastname"]);
            $composer->setDateOfBirth($_POST["DateOfBirth"]);
            $composer->setPlaceOfBirth($_POST["PlaceOfBirth"]);
            $composer->setBirthCountry($_POST["BirthCountry"]);
            $composer->setDeceased($_POST["Deceased"]);
            $composer->setID($_POST["id"]);
            $composer->update();
        }
        elseif ($_POST["action"] == "addSong"){
            $song = new Songs();
            $song->setComposersID($_POST["ComposersID"]);
            $song->setMusicalForm($_POST["MusicalForm"]);
            $song->setTitle($_POST["Title"]);
            $song->setOpus($_POST["Opus"]);
            $song->setMovement($_POST["Movement"]);
            $song->setLength($_POST["Length"]);
            $song->setDifficulty($_POST["Difficulty"]);
            $song->setWantToPlay($_POST["WantToPlay"]);
            $song->setConcertReady($_POST["ConcertReady"]);
            $song->add();
        }
        elseif ($_POST["action"] == "updateSong"){
            $song = new Songs();
            $song->setComposersID($_POST["ComposersID"]);
            $song->setMusicalForm($_POST["MusicalForm"]);
            $song->setTitle($_POST["Title"]);
            $song->setOpus($_POST["Opus"]);
            $song->setMovement($_POST["Movement"]);
            $song->setLength($_POST["Length"]);
            $song->setDifficulty($_POST["Difficulty"]);
            $song->setWantToPlay($_POST["WantToPlay"]);
            $song->setConcertReady($_POST["ConcertReady"]);
            $song->setID($_POST["id"]);
            $song->update();
        }

    }
}