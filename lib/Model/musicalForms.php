<?php

class MusicalForms
{
    private $con;
    private $id;
    private $MusicalForm;
    private $config;

    function __construct()
    {
        $this->config = parse_ini_file('config.ini');
        $this->con = new PDO('mysql:host=localhost;port=8888;dbname=' . $this->config['db'], $this->config['un'], $this->config['pw']);
        //print_r($this->con);

    }

    public function add()
    {
        $sql = "INSERT INTO MusicalForms (MusicalForm) VALUES (:a)";
        $sth = $this->con->prepare($sql);
        if (!$sth) {
            echo "\nPDO::errorInfo():\n";
            print_r($this->con->errorInfo());
            die();
        }
        $sth->bindParam("a", $this->MusicalForm, PDO::PARAM_STR);
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
        $sql = 'SELECT * FROM MusicalForms';
        // uiteindelijk resultaat zoiets als 'SELECT $scope FROM $table WHERE $choice <optional> AND $choice2 </optional> etc.
        foreach ($this->con->query($sql) as $row) {
            print $row['ID'] . "\t";
            print $row['MusicalForm'] . "\n";
        }
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
    // Edit Composer
    // Edit Composition
    // Create Playlist
    // Edit Playlist
    // Add PDF to Compositions
    // Compile PDF from Playlist PDF's
    // Edit / Create PDF Vector based?

?>

