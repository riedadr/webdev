!OBACHT: unvollständig

update Bahnhof set BLand = (SELECT id from Bundesland WHERE Bahnhof.Bundesland = Bundesland.Bundesland);
alter table Bahnhof add FOREIGN KEY (BLand) REFERENCES Bundesland(id);
ALTER TABLE Bahnhof DROP COLUMN Bundesland;











alter TABLE Bahnhof add COLUMN Regio int(1) AFTER RB;
UPDATE Bahnhof SET Regio = (SELECT id from RegionalBereich where Bahnhof.RB = RegionalBereich.RB);
alter table Bahnhof add FOREIGN KEY (Regio) REFERENCES RegionalBereich(id);
alter table Bahnhof DROP COLUMN RB;



CREATE TABLE Traeger AS SELECT Traeger FROM Bahnhof GROUP BY Traeger;
ALTER TABLE Traeger ADD COLUMN id int(2) AUTO_INCREMENT PRIMARY Key;
! ALTER TABLE Bahnhof RENAME COLUMN Traeger TR;
ALTER TABLE Bahnhof ADD COLUMN Traeger int(2);
UPDATE Bahnhof SET Traeger = (SELECT id from Traeger where TR = Traeger.Traeger);
alter table Bahnhof drop COLUMN TR;
ALTER TABLE Bahnhof ADD FOREIGN KEY (Traeger) REFERENCES Traeger(id);



CREATE TABLE Management SELECT BM, Regio FROM Bahnhof GROUP BY BM, Regio;
ALTER TABLE Management ADD COLUMN id int(2) AUTO_INCREMENT PRIMARY KEY;

ALTER TABLE Management ADD FOREIGN KEY (Regio) REFERENCES RegionalBereich(id);

ALTER TABLE Bahnhof ADD COLUMN Management int(2) AFTER BM;
UPDATE Bahnhof SET Management = (SELECT id FROM Management WHERE Bahnhof.BM = Management.BM);

!ALTER TABLE Bahnhof DROP COLUMN BM, Regio;
ALTER TABLE Bahnhof DROP FOREIGN KEY Bahnhof_ibfk_1;



alter table Bahnhof change column Management BM int(2);
alter table Bahnhof add FOREIGN key (BM) REFERENCES Management(id);