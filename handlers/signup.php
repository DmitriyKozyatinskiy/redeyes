<?php
require_once('../mdo/mdo.php');
$dbc = connect();
$user = new mdo\User($dbc);
if (!isset($_POST['p_email']) || !isset($_POST['p_password']) || !isset($_POST['p_name']))
    exit();
$reg = new mdo\Auth($dbc, $_POST['p_email'], $_POST['p_password'], $_POST['p_name']);
if ($reg->signUp())
    echo '{"alert":"Регистрация прошла успешно"}';
else
    echo '{"alert":"Ошибка"}';
$dbc->close();