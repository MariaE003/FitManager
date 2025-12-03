-- la creation des tables
CREATE TABLE cours (
id int PRIMARY KEY AUTO_INCREMENT,
nom varchar(100),
catégorie varchar(100),
dateCours date,
heure time,
duree float,
nombreMaxParticipants int
);
CREATE TABLE equipements(
id int PRIMARY KEY AUTO_INCREMENT,
nom varchar(100),
type varchar(100),
quantiteDispo int,
etat varchar(100)    
);


CREATE TABLE cours_equipements (
idC INT ,
idE INT  ,
PRIMARY KEY (idC,idE),
FOREIGN KEY (idC) REFERENCES cours(id),
FOREIGN KEY (idE) REFERENCES equipements(id)
)

-- 
1
ALTER TABLE cours_equipements ADD CONSTRAINT FOREIGN KEY (idC) REFERENCES cours(id);

-- supprimer la contrainte
ALTER TABLE cours_equipements
DROP CONSTRAINT cours_equipements_ibfk_1;

-- inserer un row dans cours
insert into cours(nom,catégorie,dateCours,heure,duree,nombreMaxParticipants) values("youga","sport","2025-05-24","12:00:00",5,12);

-- inserer un row dans equipements
INSERT INTO equipements (nom, type, quantiteDispo, etat) VALUES
('Tapis de course', 'Cardio', 5, 'Bon')

