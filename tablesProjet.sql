
DROP TABLE Catégorie CASCADE;
DROP TABLE Tuteur CASCADE;
DROP TABLE Projet CASCADE;
DROP TABLE Etudiant CASCADE;
DROP TABLE Binôme CASCADE;
DROP TABLE Choisit CASCADE;




CREATE TABLE Catégorie(
numCat INTEGER NOT NULL PRIMARY KEY,
nomCat VARCHAR(20)
);


CREATE TABLE Tuteur(
numT INTEGER NOT NULL PRIMARY KEY,
nom VARCHAR(20),
prenom VARCHAR(20),
email VARCHAR(50)
);

CREATE TABLE Projet(
numP SERIAL NOT NULL PRIMARY KEY,
intitule VARCHAR(20),
duree VARCHAR(20),
societe VARCHAR(20),
nomContact VARCHAR(30),
siteweb VARCHAR(20),
adresse VARCHAR(50),
telephone INTEGER,  
valide BOOLEAN DEFAULT FALSE,
attribue BOOLEAN DEFAULT FALSE,
numCat INTEGER   REFERENCES Catégorie(numCat) ,
numT INTEGER  REFERENCES Tuteur(numT) 
);

CREATE TABLE Etudiant(

numE INTEGER  NOT NULL UNIQUE,
nom VARCHAR(20),
prenom VARCHAR(20),
email VARCHAR(50),
telephone INTEGER,
numP INTEGER REFERENCES Projet(numP),
numB INTEGER DEFAULT 0,
PRIMARY KEY(numE)
);


CREATE TABLE Choisit(
numE INTEGER NOT NULL REFERENCES Etudiant(numE),
numP INTEGER NOT NULL REFERENCES Projet(numP),
ordre INTEGER,
PRIMARY KEY(numE,numP)
);

-- Insertion Valeurs dans Categorie
insert into Catégorie values (1,'Service');
insert into Catégorie values (2,'Recherche');
insert into Catégorie values (3,'Entreprise');

-- Insertion Valeurs dans Tuteur
insert into Tuteur values (12,'snowden','edward','es@');
insert into Tuteur values (20,'christian','bale','heh@');


--insert into Projet Values (42,'Big Data','5 mois','Google','Frank ','google.com','12 avenue polytech', 0620,True ,1 ,12 );
--insert into Projet Values (43,'Finance','2 mois','BNP ','Bob','BNP.com','13 avenue polytech', 0621, True, 2, 20);
--insert into Projet Values (44,'Etude Marche','6 mois','Cofidis','Mohammed Amine','Cofidis.com','14 avenue polytech',0622 , False, 1, 12);

-- Insertion Valeurs dans Etudiant
INSERT INTO Etudiant Values(7,'croce','axel','jjd');
INSERT INTO Etudiant Values(6,'calum ','chater','ca');
INSERT INTO Etudiant Values(5,'trump','donald','dt');
INSERT INTO Etudiant Values(1,'simpson','bart','bs');
INSERT INTO Etudiant Values(2,'flanders','ned','nf');
INSERT INTO Etudiant Values(3,'syzlak','moe','ms');
INSERT INTO Etudiant Values(4,'gumble','barney','bg');


