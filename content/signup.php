<h2 class="middle-title">Регистрация на сайте</h2>
<div class="middle-form--wrapper">
    <form action="handlers/signup.php" role="form" method="POST">
        <div class="form-group">
            <label for="p_name">Имя</label>
            <input type="text" name="p_name" id="p_name" class="form-control" placeholder="Имя" required>
        </div>
        <div class="form-group">
            <label for="p_password">Пароль</label>
            <input type="password" name="p_password" id="p_password" class="form-control" placeholder="Пароль" required>
        </div>
        <div class="form-group">
            <label for="p_email">Электронная почта</label>
            <input type="email" name="p_email" id="p_email" class="form-control" placeholder="E-Mail" required>
        </div>
        <!--
        <div class="checkbox">
            <label>
                <input type="checkbox" checked>Запомнить вход
            </label>
        </div>
        -->
        <button type="submit" class="btn btn-default">Регистрация</button>
    </form>
</div>