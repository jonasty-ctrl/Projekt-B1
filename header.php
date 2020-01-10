<?php
	if (isset($_SESSION["wi_login"])) {
		$login = $_SESSION["wi_login"];
	} else {
		$login = false;
	}
?>
<!DOCTYPE html>
<html lang="de">
	<head>
		<!-- Meta-Daten -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Die 3 Meta-Tags oben *müssen* zuerst im head stehen; jeglicher sonstiger head-Inhalt muss *nach* diesen Tags kommen -->
		<meta name="description" content="php-demo-anwendung">
		<meta name="author" content="prof. dr. walter loesel">
		<!-- Titel der Seite -->
		<title>Demo-Anwendung</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<!-- Verlinkung des zugehörigen CSS Stylesheet -->
		<!-- Bootstrap-CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Besondere Stile für diese Vorlage -->
		<link href="css/fallstudien.css" rel="stylesheet">
	</head>

	<body>
		<div class="header">
			<div class="headerlogo">
				<div class="headertext_large">Demo-Anwendung<br></div>
			</div>
		</div>
			
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
							<span class="sr-only">Navigation ein-/ausblenden</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
					  </button>
				</div>
				<div id="navbar" class="navbar-collapse collapse"  id="bs-example-navbar-collapse-1">
				<?php if ($login == true) { ?>
					<ul class="nav navbar-nav navbar-left">
						<li id="home"><a href="home.php">Home</a></li>
						<li id="demo"><a href="list.php">Demokunden</a></li>						
						<li><a href="">Item B</a></li>						
						<li><a href="">Item C</a></li>						
						<li><a href="">Item D</a></li>						
						<li><a href="">Item E</a></li>						
						<li><a href="">Item F</a></li>						
						<li><a href="">Item G</a></li>						
					</ul>	
					<ul class="nav navbar-nav navbar-right">	
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Angemeldet als <?php echo $anzeigename." | ".$rolle ?> <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="logout.php">Logout</a></li>
							</ul>
						</li>
					</ul>
				<?php } else { ?>
					<ul class="nav navbar-nav navbar-left">
						<li class="active"><a href="#">Login</a></li>				
					</ul>	
				<?php } ?>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>

