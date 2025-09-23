<?php
namespace App\Kipedreiro;
require __DIR__.'/../vendor/autoload.php';
use App\Kipedreiro\Controllers\usuarioController;

$controller = new usuarioController();
$resultado = $controller->index();
var_dump($resultado);