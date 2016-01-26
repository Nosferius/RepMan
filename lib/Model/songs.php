<?php

class Songs
{
    private $con;
    private $ID;
    private $ComposersID;
    private $MusicalForm;
    private $Title;
    private $Opus;
    private $Movement;
    private $Length;
    private $Difficulty;
    private $WantToPlay;
    private $ConcertReady;
    private $config;

    /**
     * Songs constructor.
     */
    function __construct()
    {
        $this->config = parse_ini_file('config.ini');
        $this->con = new PDO('mysql:host=localhost;port=8888;dbname=' . $this->config['db'], $this->config['un'], $this->config['pw']);
        //print_r($this->con);
    }

    /**
     *
     */
    public function add()
    {
        $sql = "INSERT INTO
                Songs (ComposersID, MusicalForm, Title, Opus, Movement, Length, Difficulty, WantToPlay,ConcertReady)
                VALUES (?,?,?,?,?,?,?,?,?)";
        $sth = $this->con->prepare($sql);

        // Catch error if connection fails
        // todo: throw Exception instead of echo and die
        if (!$sth) {
            echo "\nPDO::errorInfo():\n";
            print_r($this->con->errorInfo());
            die();
        }
        $sth->bindParam(1, $this->ComposersID, PDO::PARAM_INT);
        $sth->bindParam(2, $this->MusicalForm, PDO::PARAM_STR);
        $sth->bindParam(3, $this->Title, PDO::PARAM_STR);
        $sth->bindParam(4, $this->Opus, PDO::PARAM_INT);
        $sth->bindParam(5, $this->Movement, PDO::PARAM_INT);
        $sth->bindParam(6, $this->Length, PDO::PARAM_STR);
        $sth->bindParam(7, $this->Difficulty, PDO::PARAM_STR);
        $sth->bindParam(8, $this->WantToPlay, PDO::PARAM_INT);
        $sth->bindParam(9, $this->ConcertReady, PDO::PARAM_INT);
        $sth->execute();

        // Catch error if connection fails
        // todo: throw Exception instead of echo and die
        if($sth->errorCode() != '00000'){
            echo "\nPDO::errorInfo()\n";
            print_r($sth->errorInfo());
            die();
        }
    }

    public function update()
    {
        /*
                $sql = "UPDATE `Songs` SET `ComposersID`=?,`MusicalForm`=?,`Title`=?,`Opus`=?,`Movement`=?,
                `Length`=?,`Difficulty`=?,`WantToPlay`=?,`ConcertReady`=? WHERE `id`=?";
        */
        $sql = "UPDATE
                Songs SET ComposersID=?, MusicalForm=?, Title=?, Opus=?, Movement=?,
                Length=?, Difficulty=?, WantToPlay=?, ConcertReady=? WHERE id=?";
        $sth = $this->con->prepare($sql);
        if (!$sth) {
            echo "\nPDO::errorInfo():\n";
            print_r($this->con->errorInfo());
            die();
        }
        $sth->bindParam(1, $this->ComposersID, PDO::PARAM_INT);
        $sth->bindParam(2, $this->MusicalForm, PDO::PARAM_STR);
        $sth->bindParam(3, $this->Title, PDO::PARAM_STR);
        $sth->bindParam(4, $this->Opus, PDO::PARAM_INT);
        $sth->bindParam(5, $this->Movement, PDO::PARAM_INT);
        $sth->bindParam(6, $this->Length, PDO::PARAM_STR);
        $sth->bindParam(7, $this->Difficulty, PDO::PARAM_STR);
        $sth->bindParam(8, $this->WantToPlay, PDO::PARAM_INT);
        $sth->bindParam(9, $this->ConcertReady, PDO::PARAM_INT);
        $sth->bindParam(10, $this->ID, PDO::PARAM_INT);
        $sth->execute();

        // Catch error if connection fails
        // todo: throw Exception instead of echo and die
        if ($sth->errorCode() != '00000') {
            echo "\nPDO::errorInfo()\n";
            print_r($sth->errorInfo());
            die();
        }
    }

    /**
     * @return array
     */
    public function fetch()
    {
        $sql    = 'SELECT * FROM Songs';
        $songs  = [];

        foreach ($this->con->query($sql) as $row) {
            $song = new Songs;
            $song->setID($row['ID']);
            $song->setComposersID($row['ComposersID']);
            $song->setMusicalForm($row['MusicalForm']);
            $song->setTitle($row['Title']);
            $song->setOpus($row['Opus']);
            $song->setMovement($row['Movement']);
            $song->setLength($row['Length']);
            $song->setDifficulty($row['Difficulty']);
            $song->setWantToPlay($row['WantToPlay']);
            $song->setConcertReady($row['ConcertReady']);
            $songs[] = $song;
        }
        return $songs;
    }

    public function fetchByID()
    {
        $sql    = 'SELECT * FROM Songs WHERE id = ?';
        $sth = $this->con->prepare($sql);

        $sth->bindParam(1, $_GET['id'], PDO::PARAM_INT);

        $sth->execute();

        $row = $sth->fetch(PDO::FETCH_ASSOC);
        $this->setID($row['ID']);
        $this->setComposersID($row['ComposersID']);
        $this->setMusicalForm($row['MusicalForm']);
        $this->setTitle($row['Title']);
        $this->setOpus($row['Opus']);
        $this->setMovement($row['Movement']);
        $this->setLength($row['Length']);
        $this->setDifficulty($row['Difficulty']);
        $this->setWantToPlay($row['WantToPlay']);
        $this->setConcertReady($row['ConcertReady']);
        return $this;
    }

    /**
     * @return PDO
     */
    public function getCon()
    {
        return $this->con;
    }

    /**
     * @param PDO $con
     */
    public function setCon($con)
    {
        $this->con = $con;
    }

    /**
     * @return mixed
     */
    public function getComposersID()
    {
        return $this->ComposersID;
    }

    /**
     * @param mixed $ComposersID
     */
    public function setComposersID($ComposersID)
    {
        $this->ComposersID = $ComposersID;
    }

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param mixed $ID
     */
    public function setID($ID)
    {
        $this->ID = $ID;
    }

    /**
     * @return mixed
     */
    public function getMusicalForm()
    {
        return $this->MusicalForm;
    }

    /**
     * @param mixed $MusicalForm
     */
    public function setMusicalForm($MusicalForm)
    {
        $this->MusicalForm = $MusicalForm;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * @param mixed $Title
     */
    public function setTitle($Title)
    {
        $this->Title = $Title;
    }

    /**
     * @return mixed
     */
    public function getOpus()
    {
        return $this->Opus;
    }

    /**
     * @param mixed $Opus
     */
    public function setOpus($Opus)
    {
        $this->Opus = $Opus;
    }

    /**
     * @return mixed
     */
    public function getMovement()
    {
        return $this->Movement;
    }

    /**
     * @param mixed $Movement
     */
    public function setMovement($Movement)
    {
        $this->Movement = $Movement;
    }

    /**
     * @return mixed
     */
    public function getLength()
    {
        return $this->Length;
    }

    /**
     * @param mixed $Length
     */
    public function setLength($Length)
    {
        $this->Length = $Length;
    }

    /**
     * @return mixed
     */
    public function getDifficulty()
    {
        return $this->Difficulty;
    }

    /**
     * @param mixed $Difficulty
     */
    public function setDifficulty($Difficulty)
    {
        $this->Difficulty = $Difficulty;
    }

    /**
     * @return mixed
     */
    public function getWantToPlay()
    {
        return $this->WantToPlay;
    }

    /**
     * @param mixed $WantToPlay
     */
    public function setWantToPlay($WantToPlay)
    {
        $this->WantToPlay = $WantToPlay;
    }

    /**
     * @return mixed
     */
    public function getConcertReady()
    {
        return $this->ConcertReady;
    }

    /**
     * @param mixed $ConcertReady
     */
    public function setConcertReady($ConcertReady)
    {
        $this->ConcertReady = $ConcertReady;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param array $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

}