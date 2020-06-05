<h3>Task</h3>
<?php if($success === '1'): ?>
<script>
    alert('Сохранено!');
</script>
<?php endif; ?>
<?php if($error === '1'): ?>
<script>
    alert('Не сохранено! Нет прав доступа!');
</script>
<?php endif; ?>
<div class="task-edit">
    <form class="form-task_edit" action="/task/save/" method="POST" >
        <input name="id" type="hidden" value="<?=$task['id']?>">
        <label for="task-add_name"> Логин
        <input class="input" name="name" id="task-add_name" type="text" value="<?=$task['name']?>" required></label>
        <label for="task-add_email">Email
        <input class="input" name="email" id="task-add_email" type="email" value="<?=$task['email']?>" required></label>
        <label for="task-add_text">Текст
        <textarea class="textarea" name="text" id="task-add_text" type="text" required><?=$task['text']?></textarea></label>
        <button class="btn btn-save">Сохранить</button>
    </form>
</div> 