<?php
if(session_id() == '' || !isset($_SESSION)) {
	session_start();
}

$user = 'root';
$password = ''; //To be completed if you have set a password to root
$database = 'onegaimuscle'; //To be completed to connect to a database. The database must exist.
$port = NULL; //Default must be NULL to use default port
$mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);
$mysqli->report_mode = MYSQLI_REPORT_STRICT;
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
//echo '<p>Connection OK '. $mysqli->host_info.'</p>';
//echo '<p>Server '.$mysqli->server_info.'</p>';
?>