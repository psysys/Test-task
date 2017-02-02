<?php if($data != null){ ?>
<form  action="/main/useredit/" method="post">
    <div>
        <label for="firstname">Имя</label>
        <input type="text" name="firstname" value="<?=$data[0]['firstname'] ?>" />
    </div>    
    <div>
        <label for="lastname">Фамилия</label>
        <input type="text" name="lastname" value="<?=$data[0]['lastname'] ?>" />
    </div>
    <div>
        <label for="bdate">Дата рождения</label>
        <input type="date" name="bdate" value="<?=$data[0]['bdate'] ?>" />
    </div>
    <div>
        <label for="firstname">Электронный ящик</label>
        <input type="text" name="email" value="<?=$data[0]['email'] ?>" />
    </div>
    <div>
        <label for="password">Пароль</label>
        <input type="password" name="password" value="" />
    </div>
    <input name="update" type="hidden" value="1">
    <input name="id" type="hidden" value="<?=$data[0]['id'] ?>">
    <div>
        <input type="submit" value="Сохранить">
    </div>
</form>
<?php } else header('Location: /main/userlist'); ?>

