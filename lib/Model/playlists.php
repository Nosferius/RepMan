<?php

class playlist
{
    private $con;
    private $id;
    private $name;
    private $songs;
    private $config;

    function __construct()
    {

        $this->name;

        // this will be an array of all songs in the current playlist
        $this->songs = [];


        $this->config = parse_ini_file('config.ini');
        $this->con = new PDO('mysql:host=localhost;port=8888;dbname=' . $this->config['db'], $this->config['un'], $this->config['pw']);
        //print_r($this->con);
    }

    public function add()
    {
        $sql = "";

        // Like other models only there will be some issues
        // - You'll have to get the right SongID and PlaylistID from your view
        // - You'll have to manipulate both the cross ref table as the playliststable


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
        if ($sth->errorCode() != '00000') {
            echo "\nPDO::errorInfo()\n";
            print_r($sth->errorInfo());
            die();
        }
    }

    public function fetch()
    {
        $sql = "
          SELECT
            PlaylistSongs.ID,
            Playlists.Name as PlaylistName,
            Songs.Title as SongTitle


          FROM PlaylistSongs
          LEFT JOIN Songs ON Songs.ID = PlaylistSongs.SongsID
          LEFT JOIN Playlists ON Playlists.ID = PlaylistSongs.PlaylistsID
          WHERE PlaylistsID = 1;
        ";

        // - add to select statement all the vars you need
        // - make private vars in model
        // - set private vars in model according to sql output
        // - rest is same as other models.

    }
}