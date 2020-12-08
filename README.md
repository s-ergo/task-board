# task-board

Реализация приложения-задачника на MVC. 

Задачи состоят из:
- имени пользователя;
- е-mail;
- текста задачи;

Задачи могут редактироваться администратором, в этом случае выставляется пометка "отредактировано администратором", а также отмечаться как выполненные.

Стартовая страница - список задач с возможностью сортировки по имени пользователя, email и статусу.
- Вывод задач нужно сделать страницами по 3 штуки (с пагинацией).
- Видеть список задач и создавать новые может любой посетитель без авторизации.

Предполагается, что таблицы БД созданы заранее. Если вы хотите создать их посредством приложения, см. соответствующие методы моделей.
