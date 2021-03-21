CREATE DATABASE planning DEFAULT CHARSET=utf8 COLLATE utf8_general_ci ;

CREATE TABLE planning.utilisateurs ( id INT(20) NOT NULL AUTO_INCREMENT , nom VARCHAR(32) NOT NULL ,  prenom VARCHAR(32) NOT NULL , email VARCHAR(320) NOT NULL, mdp INT(70) NOT NULL , PRIMARY KEY  (id), UNIQUE  (email)) ENGINE = InnoDB;

CREATE TABLE planning.evenements ( id INT(20) NOT NULL AUTO_INCREMENT ,organisateurID INT(20) NOT NULL, titre VARCHAR(255) NOT NULL ,  description VARCHAR(255) ,  Type VARCHAR(32) NOT NULL ,  Date VARCHAR(32) NOT NULL , duree VARCHAR(32) NOT NULL,  lieu VARCHAR(32) NOT NULL, moyenDeTransport VARCHAR(32) NOT NULL,inviteExternes VARCHAR(225) NOT NULL, amis VARCHAR(32) NOT NULL,  PRIMARY KEY  (id),FOREIGN KEY (organisateurID) REFERENCES utilisateurs(id)) ENGINE = InnoDB;

CREATE TABLE planning.invitations ( idEvenement INT(20) NOT NULL ,  idUtilisateur INT(20) NOT NULL , PRIMARY KEY (idEvenement,idUtilisateur), FOREIGN KEY (idEvenement) REFERENCES evenements(id), FOREIGN KEY (idUtilisateur) REFERENCES utilisateurs(id)) ENGINE = InnoDB;

Select e.titre,e.description,e.Type,e.Date,e.duree,e.lieu,e.moyenDeTransport, e.inviteExternes from evenements e, invitations i  where i.idUtilisateur=? AND e.id=i.idEvenement;