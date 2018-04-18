
CREATE TABLE IF NOT EXISTS utilisateurs 
(
	ID INT unsigned NOT NULL AUTO_INCREMENT, -- ID des utilisateurs --
	nom VARCHAR(40), -- nom des utilisateurs --
	prenom VARCHAR(40), -- prenom des utilisateurs --
	identifiant VARCHAR(40), -- identifiant des utilisateurs --
	mdp VARCHAR(255), -- mot de passe --
	email VARCHAR(255), -- Adresse e-mail de chacun --
	numero INT(11), -- numero de telephone --
	status INT(11), -- status des celui qui crée un compte(etudiant, membre, employé) --
	PRIMARY KEY (ID)
);



 CREATE TABLE IF NOT EXISTS produits
 (
	ID INT unsigned NOT NULL AUTO_INCREMENT,
	nom VARCHAR(40),
	prix INT(10),
	description VARCHAR(255),
	categorie VARCHAR(40),
	urlImage VARCHAR (255) DEFAULT 'img/Produits/1.jpg',
	PRIMARY KEY(ID)
);

CREATE TABLE IF NOT EXISTS BAI
(
	ID INT unsigned NOT NULL AUTO_INCREMENT,
	nom_event VARCHAR (40),
	date_event DATE,
	/*FK_Utilisateur INT unsigned NOT NULL,*/
	description VARCHAR(255),
	urlImage VARCHAR(255) DEFAULT 'img/Produits/1.jpg',
	status VARCHAR (40),
	PRIMARY KEY (ID),
	/*FOREIGN KEY(FK_Utilisateur) REFERENCES utilisateurs(ID)*/
);

INSERT INTO utilisateurs (nom,mdp,status,email)
VALUES
('Bruno', 'doucet',2,'bruno.doucet@viacesi.fr'),
('Marc', 'rouille',1,'bruno.doucet@viacesi.fr'),
('Kerim', 'yassard',0,'bruno.doucet@viacesi.fr'),
('Orlando','samba',0,'bruno.doucet@viacesi.fr');

CREATE TABLE IF NOT EXISTS produits 
(
    ID INT unsigned NOT NULL AUTO_INCREMENT,
    nom VARCHAR (40),
    prix INT,
    description VARCHAR (255), 
    stock int,
    categorie VARCHAR (40), 
    urlImage VARCHAR (255) DEFAULT 'img/Produits/1.jpg' , 
    PRIMARY KEY (ID)
);






CREATE TABLE IF NOT EXISTS commandes 
(
	ID INT unsigned NOT NULL AUTO_INCREMENT, -- ID de la commande --
	Date_commande DATE, -- Date de la commande --
	Quantite INT(11), -- Quantité de ce dernier --
	FK_Utilisateur INT unsigned NOT NULL,-- clé etrangère lié aux ID des utilisateurs --
	PRIMARY KEY (ID),
	FOREIGN KEY(FK_Utilisateur) REFERENCES utilisateurs(ID)	
);




CREATE TABLE IF NOT EXISTS ligne_commande 
(	
	ID INT unsigned NOT NULL AUTO_INCREMENT, -- ID de ligne commande --
	FK_Commande INT unsigned NOT NULL, -- clé étrangère lié aux ID des commandes --
	Quantite INT(11), -- Quantité des commandes --
	PRIMARY KEY(ID),
	FOREIGN KEY(FK_Commande) REFERENCES commandes(ID)
);

CREATE TABLE IF NOT EXISTS commandes_produits
(
	FK_Utilisateur INT unsigned NOT NULL, -- Clé étrangère lié aux ID des utilisateurs --
	FK_Ligne_Commande INT unsigned NOT NULL, -- Clé étrangère lié aux ID de ligne commande -- 
	FOREIGN KEY(FK_Utilisateur) REFERENCES utilisateurs(ID), 
	FOREIGN KEY(FK_Ligne_Commande) REFERENCES Ligne_commande(ID)
);

CREATE TABLE IF NOT EXISTS `inscrits` (
	nom VARCHAR(40), -- nom des utilisateurs --
	prenom VARCHAR(40), -- prenom des utilisateurs --
	identifiant VARCHAR(40), -- identifiant des utilisateurs --
	email VARCHAR(255), -- Adresse e-mail de chacun --
	numero INT(11), -- numero de telephone --
  `FK_Event` int(10) UNSIGNED NOT NULL, -- Clé étrangère lié aux ID des évènements --
  `FK_utilisateur` int(10) UNSIGNED NOT NULL, 
  KEY `FK_Event` (`FK_Event`),
  KEY `FK_utilisateur` (`FK_utilisateur`)
);

CREATE TABLE IF NOT EXISTS inscrits (
	nom VARCHAR(40),
	prenom VARCHAR(40),
	identifiant VARCHAR(40),
	email VARCHAR(40),
	numero VARCHAR(40),
	FK_Event INT unsigned NOT NULL,
	FK_Utilisateur unsigned NOT NULL,
	FOREIGN KEY(FK_Event) REFERENCES BAI(ID), 
	FOREIGN KEY(FK_Utilisateur) REFERENCES utilisateurs(ID)
);

CREATE TABLE IF NOT EXISTS publications 
(
	likes INT(11),
	commentaires VARCHAR(255),
	FK_Event INT unsigned NOT NULL,
	FK_Utilisateur unsigned NOT NULL,
	FOREIGN KEY(FK_Event) REFERENCES BAI(ID), 
	FOREIGN KEY(FK_Utilisateur) REFERENCES utilisateurs(ID)
);
	

CREATE TABLE IF NOT EXISTS `publications` (
  `FK_Event` int(10) UNSIGNED NOT NULL,
  `FK_utilisateur` int(10) UNSIGNED NOT NULL,
  `likes` int(10),
  `commentaires` int(10),
  KEY `FK_Event` (`FK_Event`),
  KEY `FK_utilisateur` (`FK_utilisateur`)
);
