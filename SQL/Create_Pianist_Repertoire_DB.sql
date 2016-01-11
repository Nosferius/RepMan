CREATE DATABASE Pianist_repertoire;

CREATE TABLE Composers (
  ID INT UNSIGNED NOT NULL AUTO_INCREMENT, PRIMARY KEY (ID),
  Composer_firstname varchar (255),
  Composer_lastname varchar (255) NOT NULL,
  Birthdate DATETIME,
  Birthplace varchar (255),
  Birthcountry varchar (255),
  Dieddate varchar (255)
);

CREATE TABLE Songs (
  ComposersID INT UNSIGNED,
  INDEX ComposersID (ComposersID),
  FOREIGN KEY fk_ComposersID (ComposersID)
  REFERENCES Composers(ID)
    ON UPDATE CASCADE,
  Musical_form varchar (255) NOT NULL,
  Title varchar (255),
  Opus TINYINT (5),
  Movement TINYINT (5),
  Length TIME NOT NULL,
  Difficulty varchar (10) NOT NULL,
  Want_to_play TINYINT (1) NOT NULL,
  Concert_ready TINYINT (1) NOT NULL
);

CREATE TABLE Musical_forms (
  Musical_form varchar (255) NOT NULL
);