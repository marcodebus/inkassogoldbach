# Lösung: Aufgabe aus dem Vorstellungsgespräch 

SELECT a.Akte, a.Nachname, Sum(IIf([z].[Zahlungsdatum] Is Null,0,[z].[Zahlungsdatum])) AS Zinszahlungen
FROM Akten AS a LEFT JOIN (SELECT a1.Akte, a1.Nachname, z1.Zahlungsdatum FROM Akten AS a1 LEFT JOIN Zahlungen AS z1 ON a1.Akte = z1.Akte WHERE (((z1.Art)=2)))  AS z ON a.Akte = z.Akte
GROUP BY a.Akte, a.Nachname;

# Lösung MYSQL 
SELECT a.Akte, a.Nachname, Sum(IF(z.Betrag Is Null,0,z.Betrag)) AS Zinszahlungen FROM Akten AS a LEFT JOIN (SELECT a1.Akte, a1.Nachname, z1.Betrag FROM Akten AS a1 LEFT JOIN Zahlungen AS z1 ON a1.Akte = z1.Akte WHERE (((z1.Art)=2))) AS z ON a.Akte = z.Akte GROUP BY a.Akte, a.Nachname 
