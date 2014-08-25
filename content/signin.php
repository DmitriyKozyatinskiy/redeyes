<?php middleTitle('Вход на сайт'); ?>
<?php formOpen(array('action' => 'signin', 'id' => 'signup_form', 'class' => 'middle-form')); ?>
<?php formGroup(array('name' => 'p_email', 'text' => 'Электронная почта', 'req' => 1)); ?>
<?php formGroup(array('name' => 'p_password', 'text' => 'Пароль', 'req' => 1)); ?>
<?php subBtn('Вход'); ?>
<?php formClose(); ?>