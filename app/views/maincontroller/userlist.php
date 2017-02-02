<table class="table table-striped">
    <thead>
        <tr>
            <td>
                Имя
            </td>
            <td>
                Фамилия
            </td>
            <td>
                Дата рождения
            </td>
            <td>
                Эл. ящик
            </td>
            <td>
                Управление
            </td>
        </tr>
            
    </thead>
    <tbody>
        <?php foreach ($data as $row): ?>
            <tr>
                <td>
                    <?= $row['firstname'] ?>
                </td>
                <td>
                    <?= $row['lastname'] ?>
                </td>
                <td>
                    <?= $row['bdate'] ?>
                </td>
                <td>
                    <?= $row['email'] ?>
                </td>
                <td>
                    <?php echo "<a href=/main/useredit/".$row['id'].">Редактировать</a> | <a href=/main/userdel/".$row['id'].">Удалить</a>"; ?> 
                </td>
            </tr>    
        <?php endforeach; ?>
    </tbody>
        
</table>


