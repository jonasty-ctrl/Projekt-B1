<?php
session_name('wi_fallstudien');
@session_start();

if (isset($_SESSION["wi_error"])) {
	$loginfehler = $_SESSION["wi_error"];
} else {
	$loginfehler = false;
}

include "inc/header.php";; 
?>
<!-- breadcrumbs -->
<ol class="breadcrumb">
	<li class="active">Login</li>
</ol>

<div class="content"> 
<!-- ACHTUNG: Hier beginnt der Seiteninhalt -->
	<form class="form-horizontal" method="post" action="logincheck.php">
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
		Hier können Sie sich anmelden:
		</div>
	  </div>
	  <div class="form-group">
	  <?php 
		// Fehler anzeigen (falscher User etc.)
		if ( $loginfehler == true ) {
			echo '<div class="col-sm-offset-2 col-sm-10 alert alert-warning" role="alert">Ihre Zugangsdaten sind ungültig. Sie haben keine Berechtigung sich anzumelden.</div>';
		}
		?>
	  </div>
	  <div class="form-group">
		<label class="control-label col-sm-2" for="user">Benutzername:</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" name="user" id="user" placeholder="Benutzername">
		</div>
	  </div>
	  <div class="form-group">
		<label class="control-label col-sm-2" for="passwort">Passwort:</label>
		<div class="col-sm-10">
		  <input type="password" class="form-control" name="passwort" id="passwort" placeholder="Passwort eingeben...">
		</div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		  <button type="submit" class="btn btn-default">anmelden</button>
		</div>
	  </div>
	</form>

<!-- ACHTUNG: Hier endet der Seiteninhalt -->
</div> 

<?php
include "inc/footer.php";
session_destroy();
?>
