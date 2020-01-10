<!doctype html>
<html lang="de">

	<head>
	</head>

	<body>
		<?php
			// Datenbankverbindung herstellen
			$server = "localhost:3307";
			$user = "wi_demo_db_user";
			$pass = "admin";
			$database = "wi_demo_db";
			$message = "Verbindung fehlgeschlagen!";

			$connection = mysqli_connect($server, $user, $pass, $database)
						  or die($message);

			// Parameter aus dem Formular übernehmen
			$R_Bezeichnung = $_POST['frmR_Bezeichnung'];
			$R_Medienausstattung = $_POST['frmR_Medienausstattung'];

			// SQL-Befehl formulieren
			$sql = "INSERT INTO Vorgang   ( 	R_Bezeichnung,
												R_Medienausstattung,
												R_GebauedeID,
												R_Raumtyp,
												R_Etage,
												R_Arbeitsplatz,
												R_Flaeche)
													VALUES (	' ". 	$_POST["frmR_Bezeichnung"]. " ',' " .
																			$_POST["frmR_Medienausstattung"]. " ',' " .
																			$_POST["frmR_GebauedeID"]. " ',' " .
																			$_POST["frmR_Raumtyp"]. " ',' " .
																			$_POST["frmR_Etage"]. " ',' " .
																			$_POST["frmR_Arbeitsplaetze"]. " ',' " .
																			$_POST["frmR_Flaeche"]. "')" ;
																	
	if ($connection->query($sql) === TRUE)  {
			header("Location:./141.75.188.223\web\wi\wiB1\Steffi\framework_wi_geraetemanagement\Raumuebersicht.php ".$_GET["R_RaumID"]);
	} else {
			echo "Error: " . $sql . "<br>" . $connection->error;
			
	}										

			// SQL-Befehl ausführen
			$result = mysqli_query($connection, $sql);

			// SQL-Ergebnis prüfen und gegebenfalls Fehlermeldung ausgeben 
			if ($result == false) {		
				echo mysqli_error($connection);
			}

			// Datenbankverbindung schließen
			$result = mysqli_close($connection);
			
			// Weiterleitung zur Startseite
			// header("Location: list.php");
			exit;
		?>
	</body>

</html>