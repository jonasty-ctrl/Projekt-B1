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
	<li class="active">Neuen Raum anlegen</li>
</ol>

<!-- Menüpunkt kennzeichnen -->
<script>
	document.getElementById("Steffi").className = "active";
</script>

<div class="content"> 
<!-- ACHTUNG: Hier beginnt der Seiteninhalt -->


<!--Raum Anlegen -->
<?php
// $sql = "INSERT INTO Vorgang   ( 	R_Bezeichnung,
												// R_Medienausstattung,
												// R_GebauedeID,
												// R_Raumtyp,
												// R_Etage,
												// R_Arbeitsplatz,
												// R_Flaeche)
													// VALUES (	' ". 	$_POST["R_Bezeichnung"]. " ',' " .
																			// $_POST["R_Medienausstattung"]. " ',' " .
																			// $_POST["R_GebauedeID"]. " ',' " .
																			// $_POST["R_R_Raumtyp"]. " ',' " .
																			// $_POST["R_Etage"]. " ',' " .
																			// $_POST["R_Arbeitsplatz"]. " ',' " .
																			// $_POST["R_R_Flaeche"]. " ',' " ;
																	
	// if ($connection->query($sql) === TRUE)  {
			// header("Location:./141.75.188.223\web\wi\wiB1\Steffi\framework_wi_geraetemanagement\Raumuebersicht.php ".$_GET["R_RaumID"]);
	// } else {
			// echo "Error: " . $sql . "<br>" . $connection->error;
			
	// }										
	?>											
	<h3>Datensatz anlegen</h3>

	<form class="" method="POST" action="raum_anlegen2.php">
		<table class="table-condensed">
			<tr>
				<th class="control-label col-sm-2">Bezeichnung:</td>
				<td class="col-sm-6"><input type="text" class="form-control" name="frmR_Bezeichnung" maxlength="30" value="" required></td>
			</tr>
			<tr>
				<th class="control-label col-sm-2">Medienausstattung:</td>
				<td class="col-sm-6"><input type="text" class="form-control" name="frmR_Medienausstattung" maxlength="30" value="" required></td>
			</tr>
			<tr>
				<th class="control-label col-sm-2">GebaeudeID:</td>
				<td class="col-sm-6"><input type="nr" class="form-control" name="frmR_GebauedeID" maxlength="30" value="" required></td>
			</tr>
			<tr>
				<th class="control-label col-sm-2">Raumtyp:</td>
				<td class="col-sm-6"><input type="text" class="form-control" name="frmR_Raumtyp" maxlength="30" value="" required></td>
			</tr>
			<tr>
				<th class="control-label col-sm-2">Etage:</td>
				<td class="col-sm-6"><input type="nr" class="form-control" name="frmR_Etage" maxlength="30" value="" required></td>
			</tr>
			<tr>
				<th class="control-label col-sm-2">Arbeitsplaetze:</td>
				<td class="col-sm-6"><input type="nr" class="form-control" name="frmR_Arbeitsplaetze" maxlength="30" value="" required></td>
			</tr>
			<tr>
				<th class="control-label col-sm-2">Fläche:</td>
				<td class="col-sm-6"><input type="nr" class="form-control" name="frmR_Flaeche" maxlength="30" value="" required></td>
			</tr>
		</table>
		<br>
		<table>
			<tr>
				<td></td>
				<td>
					<button class="btn btn-default" type="submit">Speichern</button>
					<button class="btn btn-default" type="button" onclick="window.location='Raumuebersicht.php';">Abbrechen</button>
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
