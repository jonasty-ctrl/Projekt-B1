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
<!-- Breadcrumb einstellen -->
<ol class="breadcrumb">
	<li><a href="home.php">Home</a></li>
	<li><a href="Raumuebersicht.php">Raumübersicht</a></li>
	<li class="active">Details</li>
</ol>

<!-- Menüpunkt kennzeichnen -->
<script>
	document.getElementById("Steffi").className = "active";
</script>

<div class="content"> 
<!-- ACHTUNG: Hier beginnt der Seiteninhalt -->

	<h3>Details</h3>
	<?php
		// Datenbankverbindung herstellen
		$server = "localhost:3307";
		$user = "wiB14";
		$pass = "5Pqn69";
		$database = "wi_B1";
		$message = "Verbindung fehlgeschlagen!";

		$connection = mysqli_connect($server, $user, $pass, $database) or die($message);

		// URL-Parameter übernehmen
		$R_RaumID = $_GET["R_RaumID"];

		// SQL-Befehl formulieren
		$sql = "SELECT * FROM raum WHERE R_RaumID = $R_RaumID";

		// SQL-Befehl ausführen
		$result = mysqli_query($connection, $sql);

		// SQL-Ergebnis prüfen und gegebenfalls Fehlermeldung ausgeben 
		if($result == false) {
			echo mysqli_error($connection);
		}

		// SQL-Ergebnis in Array-Variable übernehmen 
		$recordset = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
		// Ersten (und einzigen) Datensatz übernehmen
		$row = $recordset[0];

		// Testausgabe (bitte auskommentieren, falls nicht benötigt)
		// echo '<pre>';
		// print_r($recordset);
		// echo '</pre>';
		// Testausgabe (bitte auskommentieren, falls nicht benötigt)
	?>
	<form class="" method="" action="">
		<table class="table-condensed">
			<tr>
				<th class="control-label col-sm-2">Bezeichnung:</td>
				<td class="col-sm-6"><input type="text" class="form-control" name="frmKNummer" maxlength="30" value="<?php echo $row['R_Bezeichnung']; ?>" readonly></td>
			</tr>
			<tr>
				<th class="control-label col-sm-2">Medienausstattung:</td>
				<td class="col-sm-6"><input type="text" class="form-control" name="frmKName" maxlength="30" value="<?php echo $row['R_Medienausstattung']; ?>" readonly></td>
			</tr>
			<tr>
				<th class="control-label col-sm-2">Raumtyp:</td>
				<td class="col-sm-6"><input type="text" class="form-control" name="frmKGeburtstag" maxlength="30" value="<?php echo $row['R_Raumtyp']; ?>" readonly></td>
			</tr>
			<tr>
				<th class="control-label col-sm-2">RaumID:</td>
				<td class="col-sm-6"><input type="text" class="form-control" name="frmKGeburtstag" maxlength="30" value="<?php echo $row['R_RaumID']; ?>" readonly></td>
			</tr>
						<tr>
				<th class="control-label col-sm-2">GebaeudeID:</td>
				<td class="col-sm-6"><input type="text" class="form-control" name="frmKGeburtstag" maxlength="30" value="<?php echo $row['R_GebaeudeID']; ?>" readonly></td>
			</tr>

						<tr>
				<th class="control-label col-sm-2">Etage:</td>
				<td class="col-sm-6"><input type="text" class="form-control" name="frmKGeburtstag" maxlength="30" value="<?php echo $row['R_Etage']; ?>" readonly></td>
			</tr>
									<tr>
				<th class="control-label col-sm-2">Arbeitsplaetze:</td>
				<td class="col-sm-6"><input type="text" class="form-control" name="frmKGeburtstag" maxlength="30" value="<?php echo $row['R_Arbeitsplaetze']; ?>" readonly></td>
			</tr>
			<tr>
				<th class="control-label col-sm-2">Flaeche:</td>
				<td class="col-sm-6"><input type="text" class="form-control" name="frmKGeburtstag" maxlength="30" value="<?php echo $row['R_Flaeche']; ?>" readonly></td>
			</tr>
		</table>
		<br>
		<table>
			<tr>
				<td>&nbsp;</td>
				<td>
					<button class="btn btn-default" type="button" onclick="window.location='edit1.php?edit_id=<?php echo $KId; ?>';">Bearbeiten</button>
					<button class="btn btn-default" type="button" onclick="window.location='del1.php?del_id=<?php echo $KId; ?>';">Löschen</button>
					<button class="btn btn-default" type="button" onclick="window.location='Raumuebersicht.php';">Zurück</button>
				</td>
			</tr>
		</table>
	</form>

<!-- ACHTUNG: Hier endet der Seiteninhalt -->
</div> 

<?php
include "inc/footer.php";

} else {
	header( "Location: login.php" );
}
?>
