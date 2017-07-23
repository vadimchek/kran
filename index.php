<?php


if ($_SERVER['REQUEST_URI'] == '/')
    $page = 'home';
else
    $page = substr($_SERVER['REQUEST_URI'], 1);


session_start();

include 'config.php';


if (file_exists("all/$page.php"))
    include "all/$page.php";

else if ($_SESSION['id'] == 1 and file_exists("auth/$page.php"))
    include "auth/$page.php";

else if ($_SESSION['id'] != 1 and file_exists("guest/$page.php"))
    include "guest/$page.php";

else
    exit('Страница 404');


function db() {
    global $db;
    $db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if(!$db) exit('Ошибка подключения к БД');
}

db();

function top($title ) {
    require_once 'html/top.php';
}

function bottom() {
    require_once 'html/bottom.php';
}


