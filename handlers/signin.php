<?php
require_once('../mdo/mdo.php');
$dbc = connect();
$user = new mdo\User($dbc);
$user->exitIfRegistered();
$reg = new mdo\Auth($dbc, $_POST['p_email'], $_POST['p_password']);
$result = $reg->signIn();
if ($result) {
    echo '{';
    echo '"setCookie":{';
    echo '"security_id":"', $result["security_id"], '",';
    echo '"session_id":"', $result["session_id"], '"';
    echo '}';
    echo '"url":"index.php"';
    echo '}';
} else
    echo '{"alert":"Ошибка"}';
$dbc->close();
