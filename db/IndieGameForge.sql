CREATE DATABASE IF NOT EXISTS IndieGameForge;
USE IndieGameForge;

DROP TABLE IF EXISTS Developpeur ;
CREATE TABLE Developpeur (idDev INT AUTO_INCREMENT NOT NULL,
nomDev VARCHAR(50),
prenomDev VARCHAR(50),
paysDev VARCHAR(50),
anneeDebutDev YEAR,
dateNaissance DATE,
dateInscription DATE,
username VARCHAR(50),
password VARCHAR(50),
PRIMARY KEY (idDev)) ENGINE=InnoDB;

DROP TABLE IF EXISTS Jeu ;
CREATE TABLE Jeu (idJeu INT AUTO_INCREMENT NOT NULL,
nomJeu VARCHAR(50),
typeJeu VARCHAR(50),
studioDevJeu VARCHAR(50),
descriptionJeu TEXT,
moteurLanguageJeu VARCHAR(50),
plateforme VARCHAR(50),
dateSortie DATE,
idDev INT,
PRIMARY KEY (idJeu)) ENGINE=InnoDB;

DROP TABLE IF EXISTS Note ;
CREATE TABLE Note (idDev INT AUTO_INCREMENT NOT NULL,
idJeu INT NOT NULL,
noteJeu FLOAT,
PRIMARY KEY (idDev,idJeu)) ENGINE=InnoDB;

ALTER TABLE Jeu ADD CONSTRAINT FK_Jeu_idDev FOREIGN KEY (idDev) REFERENCES Developpeur (idDev);

ALTER TABLE Note ADD CONSTRAINT FK_Note_idDev FOREIGN KEY (idDev) REFERENCES Developpeur (idDev);
ALTER TABLE Note ADD CONSTRAINT FK_Note_idJeu FOREIGN KEY (idJeu) REFERENCES Jeu (idJeu);