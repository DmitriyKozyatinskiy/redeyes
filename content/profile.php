<?php
$dbc = connect();
$user = new mdo\User($dbc);
$user->exitIfNotRegistered('index');
formOpen(array('action' => 'profile', 'class' => 'middle-form'));
formGroup(array('name' => 'p_name', 'text' => 'Имя', 'req' => '1'));
formGroup(array('name' => 'p_birth_date', 'type' => 'date', 'text' => 'Дата рождения'));

formClose();

$dbc->close();