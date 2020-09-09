#VBA Code für Bspw. Access Datenbank

Public Sub Query_()

    Dim conn As ADODB.Connection
    Dim records As ADODB.Recordset, fld As ADODB.Field

    Set conn = OpenConnection()
    Set records = New ADODB.Recordset

    records.Open "SELECT Akten.Akte, Akten.Nachname, (IFNULL(SUM(Zahlungen.Betrag),0) ) AS Zinszahlungen FROM Akten LEFT JOIN Zahlungen ON Akten.Akte = Zahlungen.Akte AND Zahlungen.Art = 2 GROUP BY Akten.Akte; ";
", conn

    If Not records.EOF Then

        'loop over records
        Do While Not records.EOF

            Debug.Print "-------------------------"

            For Each fld In records.Fields
                Debug.Print fld.Name, fld.OriginalValue
            Next

            records.movenext 'next record
        Loop

    End If

    records.Close
    conn.Close

End Sub
