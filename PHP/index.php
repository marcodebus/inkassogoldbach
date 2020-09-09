
<html lang="de">
<head>
  <title>Aufgabe PHP</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<h1> Ergebnis aus der Aufgabe</h1>
<p>SQL Syntax:
  <code>SELECT Akten.Akte, Akten.Nachname, (IFNULL(SUM(Zahlungen.Betrag),0) ) AS Zinszahlungen FROM Akten LEFT JOIN Zahlungen ON Akten.Akte = Zahlungen.Akte AND Zahlungen.Art = 2 GROUP BY Akten.Akte</code>
 </p>
<?php

$servername = "debus.xyz";
$username = "d0338536";
$password = "InkassoGoldbach";
$dbname = "d0338536";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Akten.Akte, Akten.Nachname, (IFNULL(SUM(Zahlungen.Betrag),0) ) AS Zinszahlungen FROM Akten LEFT JOIN Zahlungen ON Akten.Akte = Zahlungen.Akte AND Zahlungen.Art = 2 GROUP BY Akten.Akte ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 echo'<table class="table"><th>Akte</th><th>Name</th><th>Zinszahlungen</th>';
 while($row = $result->fetch_assoc()) {
   echo "<tr><td>" . $row["Akte"]. "</td><td>" . $row["Nachname"]. "</td><td> " . $row["Zinszahlungen"]. "</td></tr>";
 }
} else {
 echo "0 results";
}
$conn->close();
?>



</body>
</html>
