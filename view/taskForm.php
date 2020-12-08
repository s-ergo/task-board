<?php

namespace view;

?>

<form action="/add" method="post" class="mx-auto mt-5 w-50 p-5 shadow rounded">

    <div class="form-group">
        <label for="nameInput">Имя:</label>
        <input type="text" class="form-control" id="nameInput" name="name" value="<?= (isset($_POST['name'])) ? $_POST['name'] : '' ?>" placeholder="Петр" required>
    </div>

    <div class="form-group">
        <label for="emailInput">E-mail:</label>
        <input type="email" class="form-control" id="emailInput" name="email" value="<?= (isset($_POST['email'])) ? $_POST['email'] : '' ?>" placeholder="name@example.com" required>
    </div>

    <div class="form-group">
        <label for="textareaInput">Задание:</label>
        <textarea class="form-control" id="textareaInput" name="task" rows="7" placeholder="Опишите задание" maxlength="1000" required><?= (isset($_POST['task'])) ? $_POST['task'] : '' ?></textarea>
    </div>

    <input type="text" name="id" value="<?= (isset($_POST['id'])) ? $_POST['id'] : 0 ?>" hidden>
    <input type="text" name="status" value="<?= (isset($_POST['status'])) ? $_POST['status'] : '' ?>" hidden>
    <textarea name="original" rows="7" hidden><?= (isset($_POST['original'])) ? $_POST['original'] : '' ?></textarea>

    <button type="submit" class="btn btn-primary mt-3">Отправить</button>

</form>