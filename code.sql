CREATE DATABASE planning DEFAULT CHARSET=utf8 COLLATE utf8_general_ci ;

CREATE TABLE planning.utilisateurs ( nom VARCHAR(32) NOT NULL ,  prenom VARCHAR(32) NOT NULL ,  id INT(20) NOT NULL AUTO_INCREMENT ,  identifiant VARCHAR(32) NOT NULL ,  mdp INT(70) NOT NULL , email VARCHAR(320) NOT NULL,    PRIMARY KEY  (id), emailConfirmed BOOLEAN DEFAULT FALSE,    UNIQUE  (identifiant)) ENGINE = InnoDB;

CREATE TABLE planning.evenements ( titre VARCHAR(255) NOT NULL ,  description VARCHAR(255) ,  id INT(20) NOT NULL AUTO_INCREMENT ,  Type VARCHAR(32) NOT NULL ,  dateDebut DATETIME NOT NULL , dateFin DATETIME NOT NULL,  lieu VARCHAR(32) NOT NULL, moyenDeTransport VARCHAR(32) NOT NULL,   PRIMARY KEY  (id)) ENGINE = InnoDB;

CREATE TABLE planning.invitations ( idEvenement INT(20) NOT NULL ,  idUtilisateur INT(20) NOT NULL , PRIMARY KEY (idEvenement,idUtilisateur), FOREIGN KEY (idEvenement) REFERENCES evenements(id), FOREIGN KEY (idUtilisateur) REFERENCES utilisateurs(id)) ENGINE = InnoDB;