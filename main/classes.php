<?php

require_once 'core.php';

// Car
$ford = new Car('Ford', 600000, 'green', 15000);
$mersedes = new Car('Mersedes', 1000000, 'black', 20000);


// TV
$androidTV = new TV('Sony', 100000, 2, 1.3);
$KVN49 = new TV('KVN-49', 20000, 0.3, 0.2);
$KVN49->isHasOS = false;


// Pen
$pen1 = new Pen();
$pen1->color = 'red';
$pen1->inkColor = 'blue';
$pen1->priceInRubles = 20;
$pen2 = new Pen();
$pen2->color = 'blue';
$pen2->inkColor = 'dark-blue';
$pen2->priceInRubles = 80;


// Duck
$duck = new Duck('1', 'grey', 'male');
$duckPet = new Duck('2', 'white', 'famale');
$duckPet->setIsPetValue(true);

// Product
$barOfChocolate = new Product('Аленка', 100);
$notebook = new Product('Lenovo', 55000);
/*echo*/ $notebook->getPrice();

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Инкапсуляция</h1>
<p>Инкапсуляция - это когда мы объединяем в одну сущность участки кода, относящиеся к одному контексту, и закрываем
    доступ к наиболее важным свойствам и методам.</p>
<h2>Плюсы объектов</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br> At corporis cumque deleniti dolorum eaque eos ex fugiat
    impedit ipsam nemo nisi <br>optio perferendis quae quaerat qui, reprehenderit similique suscipit veritatis.</p>
<h2>Минусы объектов</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br> At corporis cumque deleniti dolorum eaque eos ex fugiat
    impedit ipsam nemo nisi <br>optio perferendis quae quaerat qui, reprehenderit similique suscipit veritatis.</p>
</body>
</html>