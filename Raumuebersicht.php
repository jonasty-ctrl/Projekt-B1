<?php
session_name('wi_fallstudien');
@session_start();

$login = $_SESSION["wi_login"];
$benutzername = $_SESSION["wi_benutzername"];
$benutzerid = $_SESSION["wi_benutzerid"];
$anzeigename = $_SESSION["wi_anzeigename"];
$rolle = $_SESSION["wi_rolle"]; 

if ($login == true) {

include "inc/header.php";
?>

<!-- breadcrumbs -->
<ol class="breadcrumb">
	<li><a href="home.php">Home</a></li>
	<li class="active">Raumübersicht</li>
</ol>

<div class="content"> 

<div>
		<button class="btn btn-default" type="button" onclick="window.location='raum_anlegen.php'">Neuen Raum anlegen</button>
		<br><br>
	</div>

<!-- ACHTUNG: Hier beginnt der Seiteninhalt -->
	<p>Raumübersicht</p>
	<?php
		// Datenbankverbindung herstellen
		$server = "localhost:3307";
		$user = "wiB14";
		$pass = "5Pqn69";
		$database = "wi_B1";
		$message = "Verbindung fehlgeschlagen!";

		$connection = mysqli_connect($server,$user,$pass,$database) or die($message);
	?>
	
	<?php
		// SQL-Befehl formulieren
		$sql = "SELECT * FROM raum";

		// SQL-Befehl ausführen
		$result = mysqli_query($connection, $sql);

		// SQL-Ergebnis prüfen und gegebenfalls Fehlermeldung ausgeben 
		if ($result == false) {
			echo mysqli_error($connection);
		}

		// SQL-Ergebnis in Array-Variable übernehmen 
		$recordset = mysqli_fetch_all($result, MYSQLI_ASSOC);

		// Testausgabe (bitte auskommentieren, falls nicht benötigt)
		// echo '<pre>';
		// print_r($recordset);
		// echo '</pre>';
		// Testausgabe (bitte auskommentieren, falls nicht benötigt)
	?>
	
	<table class="table table-striped">
	
		<tr>
			<th>Bezeichnung</th>
			<th>Medienausstattung</th>
			<th>GebaeudeID</th>
			<th>Raumtyp</th>
			<th>Etage</th>
			<th>Arbeitsplaetze</th>	
			<th>Fläche</th>		
				<th></th>
		</tr>
	
		<?php
		foreach($recordset as $zeile) {
		?>
		<tr>	
			<td><?php echo $zeile["R_Bezeichnung"]; ?></td>
			<td><?php echo $zeile["R_Medienausstattung"]; ?></td>
			<td><?php echo $zeile["R_GebaeudeID"]; ?></td>
			<td><?php echo $zeile["R_Raumtyp"]; ?></td>
			<td><?php echo $zeile["R_Etage"]; ?></td>
			<td><?php echo $zeile["R_Arbeitsplaetze"]; ?></td>
			<td><?php echo $zeile["R_Flaeche"]; ?></td>
			<td><a href="detail.php?R_RaumID=<?php echo $zeile["R_RaumID"];?>">Details</a></td>
		</tr>
		<?php
		}
		?>
	
	</table>
	
	
<!-- ACHTUNG: Hier endet der Seiteninhalt -->
</div> 

<?php
include "inc/footer.php";

} else {
	header( "Location: login.php" );
}
?>
