
<h2 class="task-add_header">Добавить задачу</h2>
<div class="task-add">
    <form class="form-task_add" action="/main/add/" method="POST" >
        <label for="task-add_name"> Логин
        <input class="input" name="name" id="task-add_name" type="text" required></label>
        <label for="task-add_email">Email
        <input class="input" name="email" id="task-add_email" type="email" required></label>
        <label for="task-add_text">Текст
        <textarea class="textarea" name="text" id="task-add_text" type="text" required></textarea></label>
        <button class="btn btn-add">Добавить задачу</button>
    </form>
    <?php if (isset($success)): ?>
        <script>
            alert('Сохранено');
        </script>
    <?php endif; ?>
</div>
<div class="task_header-wrapper">
    <h2 class="tasks_header">Задачи</h2>
    <div class="sort">
        <span>
            Сортировать по 
            <a class="sort_link" href="/main/sort/name">логину</a><?php if($_COOKIE['sort'] === '1' ) echo '(по возрастанию)'; else if ($_COOKIE['sort'] === '4') echo '(по убыванию)'; ?>
            <a class="sort_link" href="/main/sort/email">почте</a><?php if($_COOKIE['sort'] === '2' ) echo '(по возрастанию)'; else if ($_COOKIE['sort'] === '5') echo '(по убыванию)'; ?>
            <a class="sort_link"href="/main/sort/done">статусу</a><?php if($_COOKIE['sort'] === '3' ) echo '(не выполненные)'; else if ($_COOKIE['sort'] === '6') echo '(выполненные)'; ?>
            <a class="sort_link"href="/main/sort/none">отменить</a>
        </span>
    </div>
</div>
<div class="tasks">
    <?php foreach ($tasks as $task): ?>
        <div class="task">
            <div class="left">
                <?php if($task['done'] == true): ?>
                    <span class="done">Выполнена</span>
                <?php endif; ?>
                <?php if($task['is_edit'] == true): ?>
                    <span class="is_edit">Отредоктировано</span>
                <?php endif; ?>
                <div class="task_name-label"> Логин
                <h3 class="task_name"><?=$task['name']; ?></h3></div>
                <div class="task_email-label"> Почта
                <h3 class="task_email"><?=$task['email']; ?></h3></div>
            </div>
            <div class="rigth">
                <div class="task_text-label"> Описание
                <p class="task_text"><?=$task['text']; ?></p></div>
                
            </div>
            <?php if(isset($_COOKIE['user'])): ?>
                <a class="task-edit_link" href="<?='/task/edit/' . $task['id']; ?>">Редактировать</a>
                <?php if($task['done'] != true): ?>
                    <a class="task-done_link" href="<?='/task/done/' . $task['id']; ?>">Выполнена</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
<div class="pages">
    <div class="container">
        <div class="pages_link-wrapper">
            <?php for ($i=1; $i <= $page_count; $i++): ?>
                <a class="pages_link <?php echo ($page == $i ?  'active' : '' ) ?>" href="/main/page/<?=$i?>"><?=$i?></a>
            <?php endfor; ?>
        </div>
    </div>
</div>