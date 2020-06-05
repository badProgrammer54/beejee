<h2 class="auth_header">Auth</h2>
<div class="auth">
    <?php if($error_code === '2'):?>
        <span class="error">Неправильный логин или пароль</span>
    <?php endif; ?>
    <form class="form-auth" action="/auth/sign/" method="POST" >
        <label for="task-add_name"> Логин
        <input class="input" name="login" id="task-add_name" type="text" required></label>
        <label for="task-add_email">Пароль
        <input class="input" name="password" id="task-add_email" type="password" required></label>
        <button class="btn btn-add">Войти</button>
    </form>
</div>