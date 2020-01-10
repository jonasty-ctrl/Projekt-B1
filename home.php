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
</ol>

<div class="content"> 
<!-- ACHTUNG: Hier beginnt der Seiteninhalt -->

	<h1> Willkommen auf deiner Startseite </h1> <br>
	<p> Wähle eine Seite um dein Anliegen zu bearbeiten</p>
	<br>
	<br>
<div class="row">
  <div class="col-md-4">Raum</div>
  <div class="col-md-4">Person</div>
  <div class="col-md-4">Gerät</div>
</div><br>
<div class="row">
  <div class="col-md-4">Serviceauftrag</div>
  <div class="col-md-4">Servicekategorie</div>
  <div class="col-md-4">Auswertung</div>
</div>
<!-- ACHTUNG: Hier endet der Seiteninhalt -->
</div> 

<?php
include "inc/footer.php";

} else {
	header( "Location: login.php" );
}
?>
