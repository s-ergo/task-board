<?php

$isAdmin = (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') ? TRUE : FALSE;

foreach ($tasks as $elem) {

    $list = '<div class="row p-4 m-0 shadow-sm"><div class="col col-lg-3 m-auto overflow-auto"><p>';
    $list .= htmlentities($elem['username']);
    $list .= '</p><p><a href="mailto:';
    $list .= htmlentities($elem['email']);
    $list .= '">';
    $list .= htmlentities($elem['email']);
    $list .= '</a></p></div><div class="col col-lg-7">';
    $list .= htmlentities($elem['task']);
    $list .= '</div><div class="col col-lg-2"><p>';

    if ($isAdmin) {

        $list .= '<div class="form-group form-check"><input type="checkbox" class="form-check-input" id="';
        $list .= $elem['id'];
        $list .= '" ';

        if ($elem['status']) {
            $list .= 'checked';
        }

        $list .= '><label class="form-check-label" for="';
        $list .= $elem['id'];
        $list .= '">Выполнено</label></div>';
    } else {

        $list .= $elem['status'];
    }

    $list .= '</p><p>';
    $list .= $elem['edited'];
    $list .= '</p>';

    if ($isAdmin) {
        $list .= '<a class="btn btn-primary" href="/edit/';
        $list .= $elem['id'];
        $list .= '" role="button">Редактировать</a>';
    }

    $list .= '</div></div>';
    echo $list;
}

