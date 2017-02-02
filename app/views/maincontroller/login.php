<?php if (!\app\core\Session::isAuth()): ?>
<form action="/main/login" method="post">
    <div>
        <label for="login">Логин(email)</label>
        <input name="login" type="text" value="" />
    </div>
    <div>
        <label for="password">Пароль</label>
        <input type="password" name="password" value="" />
    </div>
    <div>
        <input type="submit" value="Войти" />
    </div>
</form>
<?php else: ?>
Вы успешно авторизовались в системе
<?php endif; ?>


