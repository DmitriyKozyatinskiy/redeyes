<?php
$dbc = connect();
$user = new mdo\User($dbc);
$user->exitIfRegistered('index');
middleTitle('Вход на сайт');
formOpen(array('action' => 'signin', 'id' => 'signup_form', 'class' => 'middle-form'));
formGroup(array('name' => 'p_email', 'text' => 'Электронная почта', 'req' => 1));
formGroup(array('name' => 'p_password', 'text' => 'Пароль', 'req' => 1));
subBtn('Вход');
formClose();
$dbc->close();