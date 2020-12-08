<?php

namespace view;

?>

<div class="w-50 mx-auto mt-5 border rounded">
    <div class="position-absolute text-primary bg-white ml-3 mt-n3 pt-1 px-2">Войти в аккаунт</div>

    <form class="p-5" action="/login" method="post">
        <div class="form-group">
            <label for="nameInput">Имя:</label>
            <input type="tel" class="form-control" id="nameInput" name="username" value="" required>
        </div>

        <div class="form-group">
            <label for="passwordInput">Пароль:</label>
            <input type="password" class="form-control" for="passwordInput" name="password" value="" required>
        </div>

        <div class="text-danger mb-3"><?= $error ?></div>
        <button type="submit" class="btn btn-primary mt-4">Submit</button>
    </form>
</div>