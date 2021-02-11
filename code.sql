CREATE DATABASE `utilisateurs` DEFAULT CHARSET=utf8 COLLATE utf8_general_ci ;
CREATE TABLE `utilisateurs`.`user` ( `nom` VARCHAR(32) NOT NULL ,  `prenom` VARCHAR(32) NOT NULL ,  `id` INT(20) NOT NULL AUTO_INCREMENT ,  `identifiant` VARCHAR(32) NOT NULL ,  `mdp` INT(70) NOT NULL ,    PRIMARY KEY  (`id`),    UNIQUE  (`identifiant`)) ENGINE = InnoDB;
ALTER TABLE `utilisateurs.user` ADD UNIQUE(`id`);
CREATE TABLE `utilisateurs`.`message` ( `id_message` INT(200) NOT NULL AUTO_INCREMENT ,  `messages` TEXT NOT NULL ,  `compteur` INT(11) NOT NULL ,  `choix` INT(11) NOT NULL ,  `image` TEXT NOT NULL ,    PRIMARY KEY  (`id_message`)) ENGINE = InnoDB;
CREATE TABLE `utilisateurs`.`contact` ( `id_utili` INT(20) NOT NULL ,  `Objet` VARCHAR(50) NOT NULL ,  `adresse_email` TEXT NOT NULL ,  `message` TEXT NOT NULL ,  `id_message` INT(50) NOT NULL AUTO_INCREMENT ,    PRIMARY KEY  (`id_message`)) ENGINE = InnoDB;

