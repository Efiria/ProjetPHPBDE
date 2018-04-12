
CREATE TABLE IF NOT EXISTS utilisateurs 
(
	ID INT unsigned NOT NULL AUTO_INCREMENT,
	nom VARCHAR(40),
	mdp VARCHAR(255),
	email VARCHAR(255),
	numero INT(40),
	status INT(11),
	PRIMARY KEY (ID)
);


CREATE TABLE IF NOT EXISTS produits 
(
    ID INT unsigned NOT NULL AUTO_INCREMENT,
    nom VARCHAR (40) NOT NULL,
    prix INT UNSIGNED NOT NULL,
    description VARCHAR (255),
    stock int NOT NULL,
    categorie VARCHAR (40) NOT NULL,
    urlImage VARCHAR (255) DEFAULT 'img/Produits/1.jpg' ,
    PRIMARY KEY (ID)
);



CREATE TABLE IF NOT EXISTS commandes 
(
	ID INT unsigned NOT NULL AUTO_INCREMENT,
	Date_commande DATE,
	FK_Utilisateur INT unsigned NOT NULL,
	PRIMARY KEY (ID),
	FOREIGN KEY(FK_Utilisateur) REFERENCES utilisateurs(ID)	
);


CREATE TABLE IF NOT EXISTS BAI
(
	ID INT unsigned NOT NULL AUTO_INCREMENT,
	date_event DATE,
	FK_Utilisateur INT unsigned NOT NULL,
	description VARCHAR(255),
	urlImage VARCHAR(255) DEFAULT 'img/Produits/1.jpg',
	PRIMARY KEY (ID),
	FOREIGN KEY(FK_Utilisateur) REFERENCES utilisateurs(ID)
);




CREATE TABLE IF NOT EXISTS ligne_commande 
(	
	ID INT unsigned NOT NULL AUTO_INCREMENT,
	FK_Commande INT unsigned NOT NULL,
	Quantite INT(11),
	PRIMARY KEY(ID),
	FOREIGN KEY(FK_Commande) REFERENCES commandes(ID)
);

CREATE TABLE IF NOT EXISTS commandes_produits
(
	FK_Utilisateur INT unsigned NOT NULL,
	FK_Ligne_Commande INT unsigned NOT NULL,
	FOREIGN KEY(FK_Utilisateur) REFERENCES utilisateurs(ID),
	FOREIGN KEY(FK_Ligne_Commande) REFERENCES Ligne_commande(ID)
);


INSERT INTO produits (nom,prix,description,stock,urlImage,categorie)
VALUES
('mug', '10',"Magnifique mug avec le logo du CESI.EXIA",13,'img/Produits/1.jpg','tasse'),
('t-shirt', '21',"Magnifique t-shirt rouge avec le logo du CESI.EXIA",12,'img/Produits/2.jpg','vetement'),
('drapeau', '15',"Magnifique drapeau avec le logo du CESI.EXIA",10,'img/Produits/3.jpg','drapeau');


INSERT INTO utilisateurs (nom,mdp,status,email)
VALUES
('Bruno', 'doucet',2,'bruno.doucet@viacesi.fr'),
('Marc', 'rouille',1,'marc.rouillet@viacesi.fr' ),
('Kerim', 'yasard',0, 'kerim.yasar@viacesi.fr'),
('Orlando','samba',0, 'orlando.samba@viacesi.fr');
