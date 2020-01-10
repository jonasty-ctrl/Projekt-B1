<?php
session_name('wi_fallstudien');
@session_start();

session_unset();
$_SESSION = array();
session_destroy();
header( "Location: login.php" );
?>