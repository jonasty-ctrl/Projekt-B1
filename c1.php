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
	<li><a href="#">Home</a></li>
	<li><a href="#">Unterpunkt</a></li>
	<li class="active">Übersicht</li>
</ol>

<div class="content"> 
<!-- ACHTUNG: Hier beginnt der Seiteninhalt -->
	<p>Kundenübersicht</p>
	<?php
		// Datenbankverbindung herstellen
		$server = "localhost:3307";
		$user = "wi_demo_db_user";
		$pass = "admin";
		$database = "wi_workshop_php";
		$message = "Verbindung fehlgeschlagen!";

		$connection = mysqli_connect($server,$user,$pass,$database) or die($message);
	?>
	
	<?php
		// SQL-Befehl formulieren
		$sql = "SELECT * FROM Kunde";

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
			<th>Vorname</th>
			<th>Nachname</th>
			<th></th>
		</tr>
	
		<?php
		foreach($recordset as $zeile) {
		?>
		<tr>	
			<td><?php echo $zeile["KVorname"]; ?></td>
			<td><?php echo $zeile["KNachname"]; ?></td>
			<td><a href="c1_kundendetails.php?kid=<?php echo $zeile["KId"]; ?>">Details</a></td>
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
