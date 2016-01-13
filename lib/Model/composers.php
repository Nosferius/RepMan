<?php

class composers{
    private $con;
    private $id;
    private $ComposerFirstname;
    private $ComposerLastname;
    private $DateOfBirth;
    private $PlaceOfBirth;
    private $BirthCountry;
    private $Deceased;
    private $config;

    function __construct()
    {
        $this->config = parse_ini_file('config.ini');
        $this->con = new PDO('mysql:host=localhost;port=8888;dbname='.$this->config['db'], $this->config['un'], $this->config['pw']);
        //print_r($this->con);

    }

    public function add()
    {
        $sql = "INSERT INTO
                Composers (ComposerFirstname, ComposerLastname, DateOfBirth, PlaceOfBirth, BirthCountry, Deceased)
                VALUES (?,?,?,?,?,?)";
        $sth = $this->con->prepare($sql);
        if (!$sth) {
            echo "\nPDO::errorInfo():\n";
            print_r($this->con->errorInfo());
            die();
        }
        $sth->bindParam(1, $this->ComposerFirstname, PDO::PARAM_STR);
        $sth->bindParam(2, $this->ComposerLastname, PDO::PARAM_STR);
        $sth->bindParam(3, $this->DateOfBirth, PDO::PARAM_STR);
        $sth->bindParam(4, $this->PlaceOfBirth, PDO::PARAM_STR);
        $sth->bindParam(5, $this->BirthCountry, PDO::PARAM_STR);
        $sth->bindParam(6, $this->Deceased, PDO::PARAM_STR);
        $sth->execute();

        // Catch error if connection fails
        // todo: throw Exception instead of echo and die
        if($sth->errorCode() != '00000'){
            echo "\nPDO::errorInfo()\n";
            print_r($sth->errorInfo());
            die();
        }
    }

    public function fetch()
    {
        $sql = 'SELECT * FROM Composers';
        // uiteindelijk resultaat zoiets als 'SELECT $scope FROM $table WHERE $choice <optional> AND $choice2 </optional> etc.
        foreach ($this->con->query($sql) as $row) {
            print $row['ID'] . "\t";
            print $row['ComposerFirstname'] . "\t";
            print $row['ComposerLastname'] . "\t";
            print $row['DateOfBirth'] . "\t";
            print $row['PlaceOfBirth'] . "\t";
            print $row['BirthCountry'] . "\t";
            print $row['Deceased'] . "\n";
        }
    }

    /**
     * @return mixed
     */
    public function getCon()
    {
        return $this->con;
    }

    /**
     * @param mixed $con
     */
    public function setCon($con)
    {
        $this->con = $con;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getComposerFirstname()
    {
        return $this->ComposerFirstname;
    }

    /**
     * @param mixed $ComposerFirstname
     */
    public function setComposerFirstname($ComposerFirstname)
    {
        $this->ComposerFirstname = $ComposerFirstname;
    }

    /**
     * @return mixed
     */
    public function getComposerLastname()
    {
        return $this->ComposerLastname;
    }

    /**
     * @param mixed $ComposerLastname
     */
    public function setComposerLastname($ComposerLastname)
    {
        $this->ComposerLastname = $ComposerLastname;
    }

    /**
     * @return mixed
     */
    public function getDateOfBirth()
    {
        return $this->DateOfBirth;
    }

    /**
     * @param mixed $DateOfBirth
     */
    public function setDateOfBirth($DateOfBirth)
    {
        $this->DateOfBirth = $DateOfBirth;
    }

    /**
     * @return mixed
     */
    public function getPlaceOfBirth()
    {
        return $this->PlaceOfBirth;
    }

    /**
     * @param mixed $PlaceOfBirth
     */
    public function setPlaceOfBirth($PlaceOfBirth)
    {
        $this->PlaceOfBirth = $PlaceOfBirth;
    }

    /**
     * @return mixed
     */
    public function getBirthCountry()
    {
        return $this->BirthCountry;
    }

    /**
     * @param mixed $BirthCountry
     */
    public function setBirthCountry($BirthCountry)
    {
        $this->BirthCountry = $BirthCountry;
    }

    /**
     * @return mixed
     */
    public function getDeceased()
    {
        return $this->Deceased;
    }

    /**
     * @param mixed $Deceased
     */
    public function setDeceased($Deceased)
    {
        $this->Deceased = $Deceased;
    }

};

?>