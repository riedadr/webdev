!OBACHT: unvollständig

ALTER TABLE Bahnhof ADD COLUMN Breite VARCHAR(11) AFTER Ort; 
ALTER TABLE Bahnhof ADD COLUMN Laenge VARCHAR(11) AFTER Breite;

UPDATE Bahnhof SET Breite=(SELECT REPLACE(Haltestelle.Breite, ',' , '.') FROM Haltestelle WHERE Haltestelle.DS100 = Bahnhof.DS100);
UPDATE Bahnhof SET Laenge=(SELECT REPLACE(Haltestelle.Laenge, ',' , '.') FROM Haltestelle WHERE Haltestelle.DS100 = Bahnhof.DS100);


!UPDATE Bahnhof SET Breite=(SELECT REPLACE(Breite, ',' , '.') FROM Bahnhof);
!UPDATE Bahnhof SET Laenge=(SELECT REPLACE(Laenge, ',' , '.') FROM Bahnhof);


ALTER TABLE Bahnhof CHANGE Breite Breite DECIMAL(10,8);
ALTER TABLE Bahnhof CHANGE Laenge Laenge DECIMAL(10,8);