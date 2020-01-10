<?php
session_name('wi_fallstudien');
@session_start();

$login = $_SESSION["wi_login"];
$benutzername = $_SESSION["wi_benutzername"];
$benutzerid = $_SESSION["wi_benutzerid"];
$anzeigename = $_SESSION["wi_anzeigename"];
$rolle = $_SESSION["wi_rolle"]; 

$page ='auswertung';

if ($login == true) {

include "inc/header.php";
?>
<!-- breadcrumbs -->
<ol class="breadcrumb">
	<li><a href="home.php">Home</a></li>
	<li><a href="Uebersicht_Auswertungen.php">Auswertungen</a></li>
	<li class="active">Auswertung 1: Planbudget bis 100.000€</li>
</ol>

<div class="content"> 
<!-- ACHTUNG: Hier beginnt der Seiteninhalt -->

	<h1>Projekte mit geplanten Budget bis 100.000€</h1>
	<?php
		// Datenbankverbindung herstellen
		$server = "localhost:3307";
		$user = "wiA44";
		$pass = "iGc4mF";
		$database = "wi_A4";
		$message = "Verbindung fehlgeschlagen!";

		$connection = mysqli_connect($server, $user, $pass, $database) or die($message);

		$planbudget = $_GET["planbudget"];
		$sql = "SELECT * FROM projekt WHERE PR_Budget_Plan < $planbudget";

		// SQL-Befehl ausführen
		$result = mysqli_query($connection, $sql);

		// SQL-Ergebnis prüfen und gegebenfalls Fehlermeldung ausgeben 
		if($result == false) {
			echo mysqli_error($connection);
		}

		// SQL-Ergebnis in Array-Variable übernehmen 
		$recordset = mysqli_fetch_all($result, MYSQLI_ASSOC);

		// Testausgabe (bitte auskommentieren, falls nicht benötigt)
		 //echo '<pre>';
		 //print_r($recordset);
		 //echo '</pre>';
		 //Testausgabe (bitte auskommentieren, falls nicht benötigt)
	?>
		<table class="table table-striped">
		<tr>
			<th> Projekt ID </th>
			<th> Bezeichnung </th>
			<th> Plan Budget </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
		</tr>
	<?php
		foreach($recordset as $row) {
	?>
			<tr>
				<td><?php echo $row["PR_ProjektID"]; ?></td>
				<td><?php echo $row["PR_Bezeichnung"]; ?></td>
				<td><?php echo $row["PR_Budget_Plan"]; ?></td>
				<td><a href="details_Projekte.php?projektid=<?php echo $row["PR_ProjektID"]; ?>">Details</td>
				<td><a href="bearbeiten_Projekte.php?projektid=<?php echo $row["PR_ProjektID"]; ?>">Bearbeiten</td>
				<td><a href="loeschen_projekt.php?projektid=<?php echo $row["PR_ProjektID"]; ?>">Löschen</td>
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
