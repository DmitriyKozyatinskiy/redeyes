<?php
$dbc = connect();
$user = new mdo\User($dbc);
$user->exitIfRegistered('index');
middleTitle('Регистрация на сайте');
formOpen(array('action' => 'signup', 'id' => 'signup_form', 'class' => 'middle-form'));
formGroup(array('name' => 'p_name', 'text' => 'Имя', 'req' => 1));
formGroup(array('name' => 'p_password', 'text' => 'Пароль', 'req' => 1));
formGroup(array('name' => 'p_email', 'text' => 'Электронная почта', 'req' => 1));
subBtn('Регистрация');
formClose();
$dbc->close();