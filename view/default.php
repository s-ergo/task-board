<div class="row mx-3 my-5 d-flex">

    <div class="col col-lg-3 m-auto">
        <a href="/add" class="btn bg-success text-white active p-2 px-3 shadow" role="button" aria-pressed="true">Добавить задачу</a>
    </div>

    <div class="col col-lg-7 m-auto ">
        <div class="dropdown">
            <a class="btn px-4 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Сортировка
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="/sort-username-asc/">имя по возрастанию</a>
                <a class="dropdown-item" href="/sort-username-desc/">имя по убыванию</a>
                <a class="dropdown-item" href="/sort-email-asc/">e-mail по возрастанию</a>
                <a class="dropdown-item" href="/sort-email-desc/">e-mail по убыванию</a>
                <a class="dropdown-item" href="/sort-status-asc/">статус по возрастанию</a>
                <a class="dropdown-item" href="/sort-status-desc/">статус по убыванию</a>
            </div>
        </div>
    </div>

    <div class="col col-lg-2 m-auto d-flex justify-content-end">
        <?php require 'authLink.php'; ?>
    </div>

</div>

<div class="shadow rounded">
    <? include "taskList.php" ?>
</div>

<nav class="mt-5 ml-4" aria-label="Page navigation">
    <ul class="pagination">
        <? include "pager.php" ?>
    </ul>
</nav>