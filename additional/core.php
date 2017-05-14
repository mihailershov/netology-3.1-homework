<?php

session_start();
// Подключаем суперкласс и интерфейс суперкласса
require_once 'classes/interfaces/TheNewsTemplateInterface.php';
require_once 'classes/TheNewsTemplate.php';

// Подключаем наследников - новость, комментарий, а также их интерфейсы
require_once 'classes/interfaces/NewsInterface.php';
require_once 'classes/News.php';
require_once 'classes/interfaces/CommentInterface.php';
require_once 'classes/Comment.php';

// Подключаем класс функций для работы и интерфейс класса
require_once 'classes/interfaces/NewsFunctionsInterface.php';
require_once 'classes/interfaces/CommentFunctionsInterface.php';
require_once 'classes/Functions.php';
$functions = new Functions;