<?php

if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
    echo '<a href="/logout" class="mr-3">Выйти</a>';
} else {
    echo '<a href="/login" class="mr-3">Войти</a>';
}

