<?php

require_once 'Fibonacci.php';
require_once 'Menu.php'; // Incluir la nueva clase Menu

date_default_timezone_set('UTC');

// Crear instancias de las clases
$fibonacci = new Fibonacci();
$menu = new Menu($fibonacci);

// Ejecutar el menú
$menu->run();

