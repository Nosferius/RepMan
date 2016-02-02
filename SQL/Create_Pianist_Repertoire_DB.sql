CREATE DATABASE Pianist_repertoire;

CREATE TABLE Composers (
  ID INT UNSIGNED NOT NULL AUTO_INCREMENT, PRIMARY KEY (ID),
  ComposerFirstname varchar (255),
  ComposerLastname varchar (255) NOT NULL,
  DateOfBirth DATE,
  PlaceOfBirth varchar (255),
  BirthCountry varchar (255),
  Deceased DATE (255)
);

CREATE TABLE Songs (
  ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (ID),
  ComposersID INT UNSIGNED,
  INDEX ComposersID (ComposersID),
  FOREIGN KEY fk_ComposersID (ComposersID)
  REFERENCES Composers(ID)
    ON UPDATE CASCADE,
  MusicalForm varchar (255) NOT NULL,
  Title varchar (255),
  Opus TINYINT (5),
  Movement TINYINT (5),
  Length TIME NOT NULL,
  Difficulty varchar (10) NOT NULL,
  WantToPlay TINYINT (1) NOT NULL,
  ConcertReady TINYINT (1) NOT NULL
);

CREATE TABLE MusicalForms (
  ID INT UNSIGNED NOT NULL AUTO_INCREMENT, PRIMARY KEY (ID),
  MusicalForm varchar (255) NOT NULL
);

CREATE TABLE Playlists (
  ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (ID),
  Name VARCHAR(255) NOT NULL
);

CREATE TABLE PlaylistSongs (
  ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (ID),
  Name VARCHAR(255) NOT NULL,
  SongsID INT UNSIGNED NOT NULL,
  PlaylistsID INT UNSIGNED NOT NULL,

  INDEX SongsID (SongsID),
  FOREIGN KEY fk_Songs (SongsID)
  REFERENCES Songs(ID),

  INDEX PlaylistsID (PlaylistsID),
  FOREIGN KEY fk_Playlists (PlaylistsID)
  REFERENCES Playlists(ID)
);