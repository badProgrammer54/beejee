
<div class="task-add">
    <form action="/main/add/" method="POST" >
        <input name="name" type="text" >
        <input name="email" type="text" >
        <textarea name="text" type="text"></textarea>
        <button>Добавить задачу</button>
    </form>
</div>
<div class="tasks">
    <?php foreach ($tasks as $task): ?>
        <div class="task">
            <h3 class="task_name"><?=$task['name']; ?></h3>
            <h4 class="task_email"><?=$task['email']; ?></h4>
            <p class="task_text"><?=$task['text']; ?></p>
            <a href="<?='/task/edit/' . $task['id']; ?>">Редактировать</a>
        </div>
    <?php endforeach; ?>
</div>
