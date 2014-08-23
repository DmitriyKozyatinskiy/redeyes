<?php
require_once('../sys/sys_includes.php');
$dbc = connect();
$user = new mdo\User($dbc);
if(!isset($_POST['p_email']) || !isset($_POST['p_password']) || !isset($_POST['p_name']))
    exit;
$reg = new mdo\Auth($dbc, $_POST['p_email'], $_POST['p_password'], $_POST['p_name']);
$reg->signUp();
$dbc->close();