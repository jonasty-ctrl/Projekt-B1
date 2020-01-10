<!doctype html>
<html lang="de">

	<head>
		<title>PHP-Demo mit Datenbankzugriff</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="author" content="prof. dr. walter loesel">
		<link rel="stylesheet" type="text/css" href="php-demo.css">
	</head>

	<body>
		<p class="seitentitel">PHP-Demo mit Datenbankzugriff (Löschen)</p>
		<br>

		<?php
			// Parameter aus der URL übernehmen
			$KId = $_GET['del_id'];
		?>

		<p>
			Wollen Sie den Datensatz wirklich löschen?
			<br><br>
			<button type="button" onclick="window.location='del2.php?del_id=<?php echo $KId ?>';">JA</button>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button type="button" onclick="window.location='start.php';">NEIN</button>

			<!-- Alternativ:
			<a href="php-demo-db-del2.php?del_id=<?php echo $KId ?>">JA</a> 
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="php-demo-db-start.php">NEIN</a> 
			-->
		</p>
	</body>

</html>