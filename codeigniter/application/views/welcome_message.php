<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="de">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<meta charset="utf-8">
	<title>Aufgabe Vorstellungsgespräch</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }



	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}



	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1> Ergebnis aus der Aufgabe</h1>
	<div id="body">

		<p>SQL Syntax:
		  <code>
SELECT a.Akte, a.Nachname, Sum(IF(z.Betrag Is Null,0,z.Betrag)) AS Zinszahlungen FROM Akten AS a LEFT JOIN (SELECT a1.Akte, a1.Nachname, z1.Betrag FROM Akten AS a1 LEFT JOIN Zahlungen AS z1 ON a1.Akte = z1.Akte WHERE (((z1.Art)=2))) AS z ON a.Akte = z.Akte GROUP BY a.Akte, a.Nachname</code>
		 </p>

	<?php
										foreach ($sql as $gt):
									?>

<table class="table" style="">
 <tr>
	 <td width="33%" style="text-align:left;">
		 <?php echo $gt['Akte'];?>
	</td>
	<td width="33%" style="text-align:left;">
		<?php echo $gt['Nachname'];?>
	</td>
	<td  width="33%" style="text-align:right;">
		<?php echo $gt['Zinszahlungen'];?>
	</td>
 </tr>
</table>




<?php
	endforeach;
?>

	</div>

</div>

</body>
</html>
