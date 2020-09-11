

Imports System.Data
Imports MySql.Data.MySqlClient

Public Class Form1


    Private Sub Button1_Click(sender As Object, e As EventArgs) Handles Button1.Click

        Dim cs As String = "Database=d0338536;Data Source=debus.xyz;" _
            & "User Id=d0338536;Password=InkassoGoldbach"
        Dim strE As String
        Dim conn As New MySqlConnection(cs)

        Dim stm As String = "SELECT Akten.Akte, Akten.Nachname, (IFNULL(SUM(Zahlungen.Betrag),0)) FROM Akten LEFT JOIN Zahlungen ON Akten.Akte = Zahlungen.Akte AND Zahlungen.Art = 2 GROUP BY Akten.Akte;"

        Try
            conn.Open()

            Dim da As New MySqlDataAdapter(stm, conn)

            Dim ds As New DataSet
            da.Fill(ds, "Akten")

            Dim dt As DataTable = ds.Tables("Akten")

            dt.WriteXml("Akten.xml")

            For Each row As DataRow In dt.Rows
                For Each col As DataColumn In dt.Columns
                    Console.WriteLine(row(col))
                    strE = strE & row(col) & " "
                Next
                Console.WriteLine("".PadLeft(20, "="))
                strE = strE & Environment.NewLine

            Next

        Catch ex As MySqlException
            Console.WriteLine("Error: " & ex.ToString())
        Finally
            conn.Close()
        End Try


        TextBox1.Text = strE
    End Sub


End Class
