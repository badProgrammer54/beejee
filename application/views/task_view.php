<h1>Task</h1>
<div class="task-edit">
    <form action="">
        <input name="id" type="hidden" value="<?=$task['id']?>">
        <input name="name" type="text" value="<?=$task['name']?>">
        <input name="email" type="text" value="<?=$task['email']?>">
        <textarea name="text" type="text"><?=$task['text']?></textarea>
        <button>Сохранить</button>
    </form>
</div>