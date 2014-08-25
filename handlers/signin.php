<?php
require_once('../mdo/mdo.php');
$dbc = connect();
$reg = new mdo\Auth($dbc, $_POST['p_email'], $_POST['p_password']);
$reg->signIn();
$dbc->close();
