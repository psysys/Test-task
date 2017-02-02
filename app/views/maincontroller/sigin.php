<?php if ($data == 'start'): ?>
<form action="/main/sigin" method="post">
    <div>
        <label for="firstname">Имя:</label>
        <input type="text" name="firstname" value="" />
    </div>
    <div>
        <label for="lastname">Фамилия:</label>
        <input type="text" name="lastname" value="" />
    </div>
    <div>
        <label for="bdate">Дата рождения:</label>
        <input type="date" name="bdate" value="" />
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="text" name="email" value="" />
    </div>
    <div>
        <label for="password">Пароль:</label>
        <input type="password" name="password" value="" />
    </div>
    <div>
        <input type="submit" value="Регистрация" />
    </div>
</form>
<?php else: ?>
Регистарция успешно завершена, можете войти используя ваши данные!
<?php endif; ?>
