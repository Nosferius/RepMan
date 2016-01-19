CREATE DATABASE Pianist_repertoire;

CREATE TABLE Composers (
  ID INT UNSIGNED NOT NULL AUTO_INCREMENT, PRIMARY KEY (ID),
  ComposerFirstname varchar (255),
  ComposerLastname varchar (255) NOT NULL,
  Birthdate DATE,
  Birthplace varchar (255),
  BirthCountry varchar (255),
  Dieddate varchar (255)
);

CREATE TABLE Songs (
  ID INT UNSIGNED NOT NULL AUTO_INCREMENT, PRIMARY KEY (ID),
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