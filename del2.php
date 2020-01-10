<!doctype html>
<html lang="de">

	<head>
	</head>

	<body>
		<?php
			// Parameter aus der URL übernehmen
			$KId = $_GET['del_id'];

			// Datenbankverbindung herstellen
			$server = "localhost:3307";
			$user = "wi_demo_db_user";
			$pass = "admin";
			$database = "wi_demo_db";
			$message = "Verbindung fehlgeschlagen!";

			$connection = mysqli_connect($server, $user, $pass, $database)
						  or die($message);

			// SQL-Befehl formulieren
			$sql = "Delete FROM Kunde WHERE K_Id = ".$KId;

			// SQL-Befehl ausführen
			$result = mysqli_query($connection, $sql);

			// SQL-Ergebnis prüfen und gegebenfalls Fehlermeldung ausgeben 
			if ($result == false) {		
				echo mysqli_error($connection);
			}

			// Datenbankverbindung schließen
			$result = mysqli_close($connection);
			
			// Weiterleitung zur Startseite
			header("Location: list.php");
			exit;
		?>
	</body>
	
</html>