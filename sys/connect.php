<?php

function connect() {
    ini_set('default_charset', 'utf-8');
    $mysqli = new mysqli('localhost', 'root', '', 'test_project');

	$driver = new mysqli_driver();
	$driver->report_mode = MYSQLI_REPORT_STRICT;
	if ($mysqli->connect_error)
	    throw new Exception("Connect failed: %s", $mysqli->connect_error);
	else
	   	return $mysqli;
}

?>