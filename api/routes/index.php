<?php

use function src\slimConfiguration;
// use function src\jwtAuth;
use App\Controllers\FormularioController;

$app = new \Slim\App(slimConfiguration());

$app->get('/usuario', FormularioController::class . ':getUsuarios');
$app->post('/usuario/id', FormularioController::class . ':getUsuarioPorId');
$app->post('/usuario', FormularioController::class . ':insertUsuario');
$app->delete('/usuario', FormularioController::class . ':deleteUsuario');
$app->put('/usuario', FormularioController::class . ':updateUsuario');

$app->run();