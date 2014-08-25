<?php middleTitle('Регистрация на сайте'); ?>
<?php formOpen(array('action' => 'signup', 'id' => 'signup_form', 'class' => 'middle-form')); ?>
<?php formGroup(array('name' => 'p_name', 'text' => 'Имя', 'req' => 1)); ?>
<?php formGroup(array('name' => 'p_password', 'text' => 'Пароль', 'req' => 1)); ?>
<?php formGroup(array('name' => 'p_email', 'text' => 'Электронная почта', 'req' => 1)); ?>
<?php subBtn('Регистрация'); ?>
<?php formClose(); ?>
<!--
<div class="checkbox">
    <label>
        <input type="checkbox" checked>Запомнить вход
    </label>
</div>
-->

<!--<button type="submit" class="btn btn-default">Регистрация</button>-->