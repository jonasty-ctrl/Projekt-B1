<?php
session_name('wi_fallstudien');
@session_start();

$benutzer = $_POST["user"];
$passwort = $_POST["passwort"];

If ($benutzer == "admin" && $passwort == "123") {
	$_SESSION["wi_login"] = true; // Loginflag -> true: angemeldet, false: nicht angemeldet
    $_SESSION["wi_benutzername"] = $benutzer; //Benutzername 
	$_SESSION["wi_benutzerid"] = 1; //Benutzer-ID
	$_SESSION["wi_anzeigename"] = "Max Mustermann"; //Vorname Nachname
	$_SESSION["wi_rolle"] = "Admin"; //Rollen: hier nur Admin
	$_SESSION["wi_error"] = false; //Fehlermeldung Login
	header( "Location: home.php" );
} else {
	$_SESSION["wi_error"] = true;
    header( "Location: login.php" );
}


?>
