<?php
require_once('../sys/sys_includes.php');
$dbc = connect();
$reg = new mdo\Auth($dbc, $_POST['p_email'], $_POST['p_password']);
$reg->signIn();
$dbc->close();
