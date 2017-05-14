<?php

session_start();
// Подключаем суперкласс и интерфейс суперкласса
require_once 'classes/interfaces/TheNewsTemplateInterface.php';
require_once 'classes/TheNewsTemplate.php';

// Подключаем наследников - новость, комментарий, а также интерфейс новости.
require_once 'classes/interfaces/NewsInterface.php';
require_once 'classes/News.php';
require_once 'classes/Comment.php';

// Подключаем функции для работы и интерфейс новостей
require_once 'classes/interfaces/FunctionsInterface.php';
require_once 'classes/Functions.php';
$functions = new Functions;