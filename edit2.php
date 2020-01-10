<!doctype html>
<html lang="de">

	<head>
	</head>

	<body>
		<?php
			// Parameter aus der URL übernehmen
			$KId = $_GET['edit_id'];

			// Werte aus dem Formular übernehmen
			$KNummer = $_POST['frmKNummer'];
			$KName = $_POST['frmKName'];
			$KDatum = $_POST['frmKDatum'];

			// Datenbankverbindung herstellen
		$server = "localhost:3307";
		$user = "wiB14";
		$pass = "5Pqn69";
		$database = "wi_B1";
		$message = "Verbindung fehlgeschlagen!";

			$connection = mysqli_connect($server, $user, $pass, $database)
						  or die($message);

			// SQL-Befehl formulieren
			$sql = "UPDATE Kunde SET K_Nummer='$KNummer', K_Name='$KName', K_Datum='$KDatum' WHERE K_Id=$KId";
			
			// SQL-Befehl ausführen
			$result = mysqli_query($connection, $sql);

			// SQL-Ergebnis prüfen und gegebenfalls Fehlermeldung ausgeben 
			if ($result == false) {		
				echo mysqli_error($connection);
			}

			// Datenbankverbindung schließen
			$result = mysqli_close($connection);
			
			// Weiterleitung zur Startseite
			header("Location: detail.php?detail_id=$KId");
			exit;
		?>
	</body>

</html>
