# Lösung: Aufgabe aus dem Vorstellungsgespräch 

SELECT Akten.Akte, Akten.Nachname, (IFNULL(SUM(Zahlungen.Betrag),0)) FROM Akten LEFT JOIN Zahlungen ON Akten.Akte = Zahlungen.Akte AND Zahlungen.Art = 2 GROUP BY Akten.Akte 
