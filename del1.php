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
	<li><a href="list.php">Demokunden</a></li>
	<li><a href="list.php">Details</a></li>
	<li class="active">Löschen</li>
</ol>

<!-- Menüpunkt kennzeichnen -->
<script>
	document.getElementById("demo").className = "active";
</script>

<div class="content"> 
<!-- ACHTUNG: Hier beginnt der Seiteninhalt -->

	<h3>Datensatz löschen</h3>
	<?php
		// Datenbankverbindung herstellen
		$server = "localhost:3307";
		$user = "wi_demo_db_user";
		$pass = "admin";
		$database = "wi_demo_db";
		$message = "Verbindung fehlgeschlagen!";

		$connection = mysqli_connect($server, $user, $pass, $database) or die($message);

		// URL-Parameter übernehmen
		$KId = $_GET["del_id"];

		// SQL-Befehl formulieren
		$sql = "SELECT * FROM Kunde WHERE K_Id = $KId";

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
				<th class="control-label col-sm-2">Kundennummer:</td>
				<td class="col-sm-6"><input type="text" class="form-control" name="frmKNummer" maxlength="30" value="<?php echo $row['K_Nummer']; ?>" readonly></td>
			</tr>
			<tr>
				<th class="control-label col-sm-2">Name:</td>
				<td class="col-sm-6"><input type="text" class="form-control" name="frmKName" maxlength="30" value="<?php echo $row['K_Name']; ?>" readonly></td>
			</tr>
			<tr>
				<th class="control-label col-sm-2">Geburtstag:</td>
				<td class="col-sm-6"><input type="text" class="form-control" name="frmKGeburtstag" maxlength="30" value="<?php echo $row['K_Datum']; ?>" readonly></td>
			</tr>
		</table>
		<br>
		<table>
			<tr>
				<td>&nbsp;</td>
				<td>Wollen Sie diesen Datensatz wirklich löschen?</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>
					<button class="btn btn-default" type="button" onclick="window.location='del2.php?del_id=<?php echo $KId; ?>';">ja&nbsp;&nbsp;</button>
					<button class="btn btn-default" type="button" onclick="window.location='detail.php?detail_id=<?php echo $KId; ?>';">nein</button>
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
