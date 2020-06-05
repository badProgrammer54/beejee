
<h2 class="task-add_header">Добавить задачу</h2>
<div class="task-add">
    <form class="form-task_add" action="/main/add/" method="POST" >
        <label for="task-add_name"> Логин
        <input class="input" name="name" id="task-add_name" type="text" ></label>
        <label for="task-add_email">Email
        <input class="input" name="email" id="task-add_email" type="text" ></label>
        <label for="task-add_text">Текст
        <textarea class="textarea" name="text" id="task-add_text" type="text"></textarea></label>
        <button class="btn btn-add">Добавить задачу</button>
    </form>
</div>
<div class="task_header-wrapper">
    <h2 class="tasks_header">Задачи</h2>
    <div class="sort">
        <span>
            Сортировать по 
            <a class="sort_link" href="/main/sort/name">логину</a>
            <a class="sort_link" href="/main/sort/email">почте</a>
            <a  class="sort_link"href="/main/sort/text">описанию</a>
        </span>
    </div>
</div>
<div class="tasks">
    <?php foreach ($tasks as $task): ?>
        <div class="task">
            <div class="left">
                <div class="task_name-label"> Логин
                <h3 class="task_name"><?=$task['name']; ?></h3></div>
                <div class="task_email-label"> Почта
                <h3 class="task_email"><?=$task['email']; ?></h3></div>
            </div>
            <div class="rigth">
                <div class="task_text-label"> Описание
                <p class="task_text"><?=$task['text']; ?></p></div>
                
            </div>
            <a class="task-edit_link" href="<?='/task/edit/' . $task['id']; ?>">Редактировать</a>
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